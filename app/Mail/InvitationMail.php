<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $url;
    private $user_name;
    private $friendemail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invitelink, $name, $email)
    {
        //
        $this->url = $invitelink;
        $this->user_name = $name;
        $this->friendemail = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invitation')->with(['url' => $this->url, 'name' => $this->user_name, 'friendemail' => $this->friendemail]);
    }
}
