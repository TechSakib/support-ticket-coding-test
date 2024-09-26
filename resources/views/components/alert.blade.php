@php
    $alert_type = session('error') ? 'danger' : (session('success') ? 'success' : null);
    $alert_message = session('error') ?? session('success');
@endphp

@if ($alert_message)
    <div class="toast border-0 show fixed shadow-lg top-0 end-0 m-3 text-bg-{{ $alert_type }} z-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body text-truncate fw-bold">{{ $alert_message }}</div>
            <button type="button" class="btn-close btn-close-white me-3 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif
