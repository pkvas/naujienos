<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-partials.head />

</head>

<body class="leading-normal bg-gray-200 tracking-normal text-white">

<x-partials.nav />

<div class="font-sans antialiased text-gray-900">
    {{ $slot }}
</div>


{{--<x-partials.footer />--}}

<livewire:scripts>
</body>
</html>
