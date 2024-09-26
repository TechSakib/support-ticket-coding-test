<div class="card border-0 shadow-sm rounded-lg">
    <div class="p-4 h5 fw-bold text-primary mb-0 d-flex justify-between">
        Support Tickets
        @if(auth()->user()->is_customer)
            <a href="{{ route('ticket.create') }}" class="btn btn-sm btn-primary ms-3 fw-bold">
                <i class="fa-solid fa-plus me-2"></i>New Ticket
            </a>
        @endif
    </div>
    <div class="mx-4 border rounded-lg overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-secondary">
                <tr>
                    <th class="text-nowrap text-center py-3">Subject</th>
                    <th class="text-nowrap text-center py-3">Description</th>
                    <th class="text-nowrap text-center py-3">Status</th>
                    <th class="text-nowrap text-center py-3">Created At</th>
                    <th class="text-nowrap text-center py-3">Closed At</th>
                    <th class="text-nowrap text-center py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tickets as $ticket)
                    <tr>
                        <th class="text-nowrap px-3" scope="row">{{ $ticket->subject }}</th>
                        <td>
                            <small>{{ \Illuminate\Support\Str::limit($ticket->description, 200) }}</small>
                        </td>
                        <td class="text-nowrap text-center px-3">
                            <span class="badge rounded-pill text-bg-{{ \App\Models\Ticket::STATUS_BACKGROUNDS[$ticket->status] }} text-capitalize py-2 px-4">{{ $ticket->status }}</span>
                        </td>
                        <td class="text-nowrap text-center">
                            <small>{{ \App\Services\FormatterService::formatDateTime($ticket->created_at) }}</small>
                        </td>
                        <td class="text-nowrap text-center">
                            <small>{{ $ticket->closed_at ? \App\Services\FormatterService::formatDateTime($ticket->closed_at) : '-' }}</small>
                        </td>
                        <td class="text-nowrap text-center">
                            <a href="{{ route('ticket.thread', $ticket->id) }}" class="btn btn-sm btn-primary m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Threads">
                                <i class="fa-regular fa-comments me-2"></i>Threads
                            </a>

                            @if(auth()->user()->is_admin)
                                <button type="button" data-close-ticket-action="{{ route('ticket.close', $ticket->id) }}"  class="btn btn-sm btn-danger close-ticket-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Close Ticket" {{ $ticket->is_closed ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-lock me-2"></i>Close Ticket
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td class="text-nowrap align-middle" colspan="100%">
                        <h6 class="text-black-50 text-center fw-bolder p-2">No Support Ticket Found</h6>
                    </td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <span class="p-4">{{ $tickets->links() }}</span>
</div>

<x-ticket-close-modal />

@push('js')
    <script>
        $('.close-ticket-btn').click(function (event) {
            event.preventDefault();
            let action = $(this).data('close-ticket-action');

            $('#ticketCloseModal form').attr('action', action)
            $('#ticketCloseModal').modal('show');
        })
    </script>
@endpush
