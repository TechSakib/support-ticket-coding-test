<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">{{ __('Dashboard') }}</x-slot>

    <div class="py-5">
        @include('partial.ticket-card')
    </div>
</x-app-layout>
