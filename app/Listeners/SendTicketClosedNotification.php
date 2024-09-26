<?php

namespace App\Listeners;

use App\Events\TicketClosedEvent;
use App\Services\MailService;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;

class SendTicketClosedNotification
{
    /**
     * Handle the event.
     */
    public function handle(TicketClosedEvent $ticketClosedEvent): void
    {
        $app_name = config('app.name');
        $ticket = $ticketClosedEvent->ticket;
        $customer = $ticket->user ?? null;
        $ticket_url = route('ticket.thread', $ticket->id);

        $recipient_email = $customer?->email;
        $subject = "Your Support Ticket Has Been Closed";

        $body = "<p>Dear $customer?->name,</p>
 <p>We are pleased to inform you that your support ticket has been closed. Please find the details of your ticket below:</p>
 <div>
    <p><strong>Ticket : </strong><a href='$ticket_url'>$ticket->subject</a></p>
    <p style='white-space: pre-line'><strong>Closing Reason : </strong> $ticket->closing_reason</p>

    <p>If you feel the issue has not been completely resolved, or you have any additional questions, feel free to reply to this email, and our support team will assist you further.</p>
    <p>Thank you for your patience and for choosing our service!</p>
    <br/>
    <br/>
    <br/>
    <p>Best regards,</p>
    <p><strong>Support Team</strong></p>
    <p><h2>$app_name</h2></p>
</div>";

        if ($recipient_email) MailService::sendEmail($recipient_email, $subject, $body, 'mail.global');
    }
}
