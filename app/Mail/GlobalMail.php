<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
//use Illuminate\Mail\Mailables\Content;
//use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GlobalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view_path;
    public $mail_content;

    /**
     * Create a new message instance.
     */
    public function __construct($mail_content, $subject, $view_path)
    {
        $this->mail_content = $mail_content;
        $this->subject = $subject;
        $this->view_path = $view_path;
    }

    public function build()
    {
        return $this->view($this->view_path);
    }
}
