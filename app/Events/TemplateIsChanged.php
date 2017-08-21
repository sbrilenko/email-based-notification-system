<?php

namespace App\Events;

use App\User;
use App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TemplateIsChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $feedback = [];
    public $event;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $feeback, Events $event)
    {
        $this->user = $user;
        $this->feedback = $feeback;
        $this->event = $event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
