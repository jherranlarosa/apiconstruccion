<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Constant\SenderMail;


class MailIncident extends Mailable
{
    use Queueable, SerializesModels;


    public $dato;
    public $view;
    public $subject;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view,$dato,$subject)
    {
        $this->dato = $dato;
        $this->view = $view;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(SenderMail::MAIL_INCIDENT)
            ->subject($this->subject)
            ->view($this->view);
    }
}
