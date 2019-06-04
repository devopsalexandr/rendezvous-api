<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AuthUserVisitProfile implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;

    public $authUser;

    public function __construct(User $user, Authenticatable $authUser)
    {
        $this->user = $user;

        $this->authUser = $authUser;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('App.User.' . $this->user->id);
    }
}
