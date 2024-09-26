<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->is_customer;
    }

    public function close(User $user, Ticket $ticket): bool
    {
        return $user->is_admin;
    }

    public function viewThread(User $user, Ticket $ticket): bool
    {
        return $user->id == $ticket->user_id || $user->is_admin;
    }

    public function createThread(User $user, Ticket $ticket): bool
    {
        return $user->id == $ticket->user_id || $user->is_admin;
    }
}
