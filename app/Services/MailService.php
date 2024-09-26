<?php

namespace App\Services;

use App\Mail\GlobalMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendEmail($recipient_email, $subject, $body, $view_path): void
    {
        $mailableClass = new GlobalMail($body, $subject, $view_path);

        Mail::to($recipient_email)->send($mailableClass);
    }
}
