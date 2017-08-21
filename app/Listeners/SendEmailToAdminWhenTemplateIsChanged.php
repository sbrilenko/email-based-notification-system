<?php

namespace App\Listeners;

use App\User;
use Mail;
use App\Mail\MailSender;
use App\Events\TemplateIsChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToAdminWhenTemplateIsChanged
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
     * @param  TemplateIsChanged  $event
     * @return void
     */
    public function handle(TemplateIsChanged $event)
    {
        Log::info('sent to admin info - template is changed', ['user' => $event->user,'feedback' => $event->feedback,'event' => $event->event]);
        $mailSender =new MailSender($event->user, $event->feedback, $event->event);
        $eventTemplate = $event->event->templates()->first();
        $userWhoChanged = User::find($eventTemplate->user_changed);
        $mailSender->subject('Template "'.$eventTemplate->name.'" was changes by '.$userWhoChanged->name.', email '.$userWhoChanged->email);
        $mailSender->from(config('mail.from.site_address'),config('mail.from.site_name'));
        Mail::to(config('mail.from.address'))->queue($mailSender);
    }
}
