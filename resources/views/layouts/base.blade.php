<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-partials.head />

</head>

<body class="leading-normal tracking-normal text-white">

<x-partials.nav/>

<div class="font-sans antialiased text-gray-900">
    {{ $slot }}
</div>



<livewire:scripts>
</body>
</html>
