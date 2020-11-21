<?php

namespace App\Http\Livewire\Lead;

use App\Models\Leads;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $leads = Leads::all()->sortByDesc('created_at');
        return view('livewire.lead.show', ['leads' => $leads]);
    }

    public function markAsDone(Leads $lead)
    {
        $lead->status = true;
        $lead->save();
    }
}
