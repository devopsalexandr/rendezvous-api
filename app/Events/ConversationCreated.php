<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ConversationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $conversation;

    protected $receiverId;

    public function __construct($conversation, $receiverId)
    {
        $this->conversation = $conversation;

        $this->receiverId = $receiverId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('conversations.' . $this->receiverId);
    }
}
