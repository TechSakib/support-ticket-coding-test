<x-app-layout>
    @section('title', "Ticket ($ticket->subject)")
    @push('css')
        <style>
            .threads-body {
                height: 400px;
            }

            .threads-body > div {
                width: 80%;
            }
        </style>
    @endpush

    <div class="py-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-light fw-bold d-flex justify-content-between align-items-center">
                        {{ $ticket->subject }}
                        <span class="badge rounded-pill text-bg-{{ \App\Models\Ticket::STATUS_BACKGROUNDS[$ticket->status] }} text-capitalize py-2 px-3">{{ $ticket->status }}</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="card-title fw-bold">Created By : </span>
                            <p class="card-text">{{ $ticket->user?->name ?? 'Unspecified User' }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="card-title fw-bold">Creator Email : </span>
                            <p class="card-text">
                                <a href="mailto:{{ $ticket->user?->email }}" target="_blank" class="text-decoration-none">{{ $ticket->user?->email }}</a>
                            </p>
                        </div>

                        <div class="mb-3">
                            <span class="card-title fw-bold">Description : </span>
                            <p class="card-text" style="white-space: pre-line;">
                                <i class="fa-solid fa-angles-left fa-xs text-primary me-2"></i>{{ $ticket->description }}<i class="fa-solid fa-angles-right fa-xs text-primary ms-2"></i>
                            </p>
                        </div>

                        <div class="mb-3">
                            <span class="card-title fw-bold">Created At : </span>
                            <small class="card-text text-muted">{{ \App\Services\FormatterService::formatDateTime($ticket->created_at) }}</small>
                        </div>


                        @if($ticket->is_closed)
                            <div class="mb-3">
                                <span class="card-title fw-bold">Closed At : </span>
                                <small class="card-text text-muted">{{ \App\Services\FormatterService::formatDateTime($ticket->closed_at) }}</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-light fw-bold d-flex justify-content-between align-items-center">
                        Threads
                        @if(auth()->user()->is_admin && !$ticket->is_closed)
                            <button type="button" data-close-ticket-action="{{ route('ticket.close', $ticket->id) }}"  class="btn btn-sm btn-danger close-ticket-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Close Ticket" {{ $ticket->is_closed ? 'disabled' : '' }}>
                                <i class="fa-solid fa-lock me-2"></i>Close Ticket
                            </button>
                        @endif
                    </div>

                    <div class="card-body overflow-y-auto threads-body">
                        @forelse($ticket->threads as $thread)
                            <div class="d-flex mb-3 {{ $thread->user_id == auth()->id() ? 'flex-row-reverse text-end float-end' : '' }}">
                                <div class="fw-bold py-2">
                                    {{ $thread->user?->is_admin ? 'Support' : ($thread->user?->name ?? 'Unspecified User') }}
                                </div>
                                <div class="fw-bold py-2 mx-2">:</div>
                                <div>
                                    <p class="mb-0 px-3 py-2 rounded-lg bg-light text-black-75 text-center">{{ $thread->message }}</p>
                                    <small class="text-muted">{{ \App\Services\FormatterService::formatDateTime($thread->created_at) }}</small>
                                </div>
                            </div>
                        @empty
                            <span class="d-flex justify-content-center align-items-center h-100 text-center text-light">
                                <i class="fa-regular fa-comments display-1"></i>
                            </span>
                        @endforelse
                    </div>

                    <div class="card-footer pb-4">
                        @if($ticket->is_closed)
                            The ticket has been closed as
                            <span class="fst-italic ms-2">{{ $ticket->closing_reason ?? '-' }}</span>
                        @else
                            <form action="{{ route('ticket.store-thread', $ticket->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Write a reply..." required></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-paper-plane me-2"></i>Send Reply
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
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
</x-app-layout>
