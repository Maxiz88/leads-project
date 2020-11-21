<?php

namespace App\Http\Livewire\Lead;

use App\Models\Leads;
use App\Models\User;
use App\Notifications\LeadCreated;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $username;
    public $email;
    public $subject;
    public $description;
    public $file;
    public $g_recaptcha_response;

    protected $rules = [
        'username'     => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|min:10',
        'description' => 'required|min:15',
        'file' => 'file|max:100|mimes:doc,docx,pdf,xls,xlsx',
        'g_recaptcha_response' => 'required|captcha',
    ];


    public function render()
    {
        //return flash about limit of lead a day
        $last_user_lead = Leads::all()->where('user_id', '=', Auth::id())->last();
        if($last_user_lead) {
            $current_datetime = Carbon::now()->toDateTimeString();
            $last_lead_datetime = new \DateTime($last_user_lead->created_at);
            $current_datetime = new \DateTime($current_datetime);
            $interval = $last_lead_datetime->diff($current_datetime);
            if($interval->d < 1) {
                session()->flash('leads_limitation', 'You can send no more one lead a day!');
            }
        }

        return view('livewire.lead.form');
    }

    public function createLead()
    {
        $this->validate();

        $lead = new Leads();
        $lead->user_id = Auth::id();
        $lead->username = $this->username;
        $lead->email = $this->email;
        $lead->subject = $this->subject;
        $lead->description = $this->description;

        $filename = time() .'_'. $this->file->getClientOriginalName();
        $this->file->storeAs('public/files', $filename);
        $lead->file = $filename;

        $lead->save();
        session()->flash('message', 'Lead have created successfully!');
        $this->sendNotification($lead);
        //return redirect()->route('dashboard');
    }

    /**
     * @param $lead
     * send email notification to managers
     */
    public function sendNotification($lead)
    {
        $managers = User::role('manager')->get();
        $when = now()->addMinutes(2);
        foreach ($managers as $manager) {
            $manager->notify((new LeadCreated($lead))->delay($when));
        }

    }

}
