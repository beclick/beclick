<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $slot;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject_message, $mail_message)
    {
        $this->subject = $subject_message;
        $this->slot = $mail_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.mail.html.message');
    }
}
