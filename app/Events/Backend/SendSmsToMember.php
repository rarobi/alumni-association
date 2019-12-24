<?php

namespace App\Events\Backend;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendSmsToMember
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    public $username;
    public $amount;
    public $number;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($member_number,$amount)
    {
//        $this->username = $member_name;
        $this->amount = $amount;
        $this->number   = $member_number;
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
