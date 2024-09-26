<?php

namespace App\Http\Controllers;

use App\Events\TicketClosedEvent;
use App\Events\TicketCreatedEvent;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(StoreTicketRequest $request)
    {
        try {
            $ticket = auth()->user()->tickets()->create([
                'subject'       => $request->subject,
                'description'   => $request->description,
                'status'        => Ticket::STATUS_OPEN,
            ]);

            TicketCreatedEvent::dispatch($ticket);

            return redirect()
                ->route('dashboard')
                ->with('success', 'Ticket opened successfully');
        }
        catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function close(Ticket $ticket, Request $request)
    {
        $this->authorize('close', $ticket);
        if ($ticket->is_closed) return back()->with('error', 'Ticket already closed');

        $request->validate([
            'closing_reason'    => 'nullable|string',
        ]);

        try {
            $ticket->update([
                'status'            => Ticket::STATUS_CLOSED,
                'closing_reason'    => $request->closing_reason,
                'closed_at'         => Carbon::now(),
            ]);

            $ticket = $ticket->load('user:id,name,email')->refresh();
            TicketClosedEvent::dispatch($ticket);

            return back()
                ->with('success', 'Ticket successfully closed');
        }
        catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    public function thread(Ticket $ticket)
    {
        $this->authorize('view-thread', $ticket);

        $ticket = $ticket->load([
            'user:id,name,email',
            'threads.user:id,name,type'
        ]);

        return view('ticket.thread', compact('ticket'));
    }

    public function storeThread(Ticket $ticket, Request $request)
    {
        $this->authorize('create-thread', $ticket);
        if ($ticket->is_closed) return back()->with('error', 'Ticket already closed');

        $request->validate([
            'message'   => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $ticket->threads()->create([
                'user_id' => auth()->id(),
                'message' => $request->message,
            ]);

            $ticket->update([
                'status'    => auth()->user()->is_admin ? Ticket::STATUS_REPLIED : Ticket::STATUS_OPEN,
            ]);

            DB::commit();
            return back()
                ->with('success', 'Thread updated successfully');
        }
        catch (\Exception $exception) {
            DB::rollBack();

            return back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }
}
