<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Naujienos')</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"></script>
    @livewireStyles

    @bukStyles(true)

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="flex px-4 py-6 mx-auto space-x-8 max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}

                            @if(isset($nav))
                                {{ $nav }}
                            @endif

                        </div>
                    </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
{{--        @stack('modals')--}}

        @livewireScripts
{{--        @livewire('livewire-ui-modal')--}}
        @bukScripts(true)
    </body>
</html>
