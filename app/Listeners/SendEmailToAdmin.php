<?php

namespace App\Listeners;

use Mail;
use App\Mail\MailSender;
use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToAdmin
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
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        //
        Log::info('to admin', ['user' => $event->user,'feedback' => $event->feedback,'event' => $event->event]);
        $mailSender =new MailSender($event->user, $event->feedback, $event->event);
        $subject = 'This is info about new user, '.$event->user->name;
        $mailSender->subject($subject);
        $mailSender->from(config('mail.from.site_address'),config('mail.from.site_name'));
        Mail::to(config('mail.from.address'))->queue($mailSender);

    }
}
