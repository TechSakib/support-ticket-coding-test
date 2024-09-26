<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tickets = auth()->user()->is_admin
            ? Ticket::query()
            : auth()->user()->tickets();

        $tickets = $tickets
            ->latest()
            ->paginate(10);

        return view('dashboard', compact('tickets'));
    }
}
