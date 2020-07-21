<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$template)
    {
        $this->email = $email;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user.dangnhap.template.mail_template');
    }
}
