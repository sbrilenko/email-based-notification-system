<?php

namespace App\Listeners;

use Mail;
use App\Mail\MailSender;
use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToUser
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
        Log::info('to user', ['user' => $event->user,'feedback' => $event->feedback,'eventId' => $event->event]);
        $mailSender =new MailSender($event->user, $event->feedback, $event->event);
        $mailSender->subject($event->event->templates()->first()->subject);
        $mailSender->from(config('mail.from.site_address'),config('mail.from.site_name'));
        Mail::to($event->user->email)->queue($mailSender);
    }
}
