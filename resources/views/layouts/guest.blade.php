<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body class="font-sans text-gray-900 antialiased">
        <x-alert />
        @auth
            @include('layouts.navigation')
        @endauth
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="mb-3">
                <a href="/">
                    <x-application-logo class="h-10 w-auto fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        @include('layouts.foot')
    </body>
</html>
