<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-partials.head />

</head>

<body class="leading-normal tracking-normal text-white gradient">

    <x-partials.nav />

    <x-ui.alerts />

    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>


    <x-partials.footer />

    <livewire:scripts>
</body>
</html>
