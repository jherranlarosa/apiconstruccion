<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Constant\SenderMail;


class MailInvoice extends Mailable
{
    use Queueable, SerializesModels;


    public $dato;
    public $view;
    public $subject;
    public $type;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view,$dato,$subject,$type)
    {
        $this->dato = $dato;
        $this->view = $view;
        $this->subject = $subject;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender = '';
        switch ($this->type) {
            case 1:
                $sender = SenderMail::MAIL_INVOICE_TV;
                break;
            case 2:
                $sender = SenderMail::MAIL_INVOICE_CONT;
                break;
            case 3:
                $sender = SenderMail::MAIL_INVOICE_SG;
                break;
            
            default:
                # code...
                break;
        }
        return $this->from($sender)
            ->subject($this->subject)
            ->view($this->view);
    }
}
