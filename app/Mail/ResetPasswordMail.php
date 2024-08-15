<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $defaultPassword;

    /**
     * Create a new message instance.
     *
     * @param string $defaultPassword The default password to be sent to the user.
     */
    public function __construct(string $defaultPassword)
    {
        $this->defaultPassword = $defaultPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your One-Time Password Reset Link')
            ->view('emails.reset_password')
            ->with([
                'defaultPassword' => $this->defaultPassword,
            ]);
    }
}
