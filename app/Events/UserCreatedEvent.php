<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class UserCreatedEvent
{
    use SerializesModels;
    public $user;

    /**
     * UserCreatedEvent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}
