<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LeadFormTest extends DuskTestCase
{
    /**
     * A Dusk test on lead create form
     * @throws \Throwable
     */
    public function testBasicExample()
    {
        $user = User::find(2);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/dashboard/leads')
                ->type('username', $user->name)
                ->type('email', $user->email)
                ->type('subject', 'aaaaaaaaaa')
                ->type('description', 'bbbbb bbbbb bbbbb')
                ->attach('file', __DIR__.'1605653346_JD.PHP.pdf')
                ->screenshot('browser_lead_form')
                ->press('Save')
                ->waitForReload()
                ->assertPathIs('/dashboard/leads')
                ->assertSee('Lead have created successfully!');
        });
    }
}
