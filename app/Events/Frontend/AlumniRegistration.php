<?php

namespace App\Events\Frontend;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AlumniRegistration
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_info;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_info)
    {
        $this->user_info = $user_info;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
