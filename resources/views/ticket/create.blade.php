<x-app-layout>
    @section('title', 'Create Ticket')

    <div class="py-5">
        <div class="card p-4">
            <form action="{{ route('ticket.store') }}" method="POST" class="g-3">
                @csrf

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Enter ticket subject" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe your issue" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Ticket</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
