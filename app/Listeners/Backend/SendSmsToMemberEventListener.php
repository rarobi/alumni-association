<?php

namespace App\Listeners\Backend;

use App\Events\Backend\SendSmsToMember;
use App\Jobs\SendSms;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSmsToMemberEventListener
{
    use DispatchesJobs;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SendSmsToMember  $event
     * @return void
     */
    public function handle(SendSmsToMember $event)
    {
//        $username = $event->username;
        $amount = $event->amount;
        $member_number = $event->number;

        $this->dispatch(new SendSms($amount,$member_number));
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\SendSmsToMember::class,
            'App\Listeners\Backend\SendSmsToMemberEventListener@handle'
        );
    }
}
