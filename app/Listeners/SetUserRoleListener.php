<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Permission\Models\Role;
use App\Models\User;
class SetUserRoleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event to add role for new user.
     * Assign first registered user to manager, all others user to client
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $role_manager = Role::findByName('manager');
        $role_client = Role::findByName('client');

        $event->user->assignRole($event->user->id == 1 ? $role_manager : $role_client);
    }
}
