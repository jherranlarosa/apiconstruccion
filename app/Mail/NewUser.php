<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Security\SecurityProfileUser;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SecurityProfileUser $user)
    {
        $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('orderingmn.pe@telefonica.com','Ordering')
            ->view('emails.succesusercreate')
            ->with([
                'nombres' => $this->user->username,
                'email' => $this->user->email,
            ]);
    }
}
