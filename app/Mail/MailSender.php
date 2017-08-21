<?php

namespace App\Mail;

use App\User;
use App\Notifications;
use App\Events;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $feedback = [];
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $feedback, Events $event)
    {
        //
        $this->user = $user;
        $this->feedback = $feedback;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $eventTemplate = $this->event->templates()->first();
        return $this->view('mails.'.$eventTemplate->name, ['user'=>$this->user,
                'feedback' => $this->feedback,
                'event' => $this->event, 'content'=>$this->event->templates()->first()->template]);
    }
}
