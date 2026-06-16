<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $uid;
    public $id;
    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $uid, $id, $code)
    {
        $this->name = $name;
        $this->uid = $uid;
        $this->id = $id;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Your Password - GoldenWay International')
                    ->view('mail.password_reset');
    }
}
