<?php

namespace App\Listeners;

use App\Events\TicketCreatedEvent;
use App\Models\User;
use App\Services\MailService;

//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;

class SendTicketCreatedNotification
{
    /**
     * Handle the event.
     */
    public function handle(TicketCreatedEvent $ticketCreatedEvent): void
    {
        $app_name = config('app.name');
        $ticket = $ticketCreatedEvent->ticket;
        $ticket_url = route('ticket.thread', $ticket->id);

        $recipient_email = User::admin()->value('email');
        $subject = "A New Support Ticket Opened";

        $body = "<p>Dear Admin,</p>
 <p>A new support ticket has been opened. Below are the details:</p>
 <div>
    <p><strong>Ticket : </strong><a href='$ticket_url'>$ticket->subject</a></p>
    <p><strong>Description : </strong></p>
    <p style='white-space: pre-line'>$ticket->description</p>

    <br/>
    <br/>
    <br/>
    <p><h2>$app_name</h2></p>
</div>";

        if ($recipient_email) MailService::sendEmail($recipient_email, $subject, $body, 'mail.global');
    }
}
