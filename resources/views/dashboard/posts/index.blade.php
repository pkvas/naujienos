<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Naujienos') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">

            <x-jet-nav-link href="{{ route('control_posts.index') }}" :active="request()->routeIs('control_posts.index')">
                {{ __('Pagrindinis') }}
            </x-jet-nav-link>

            <x-jet-nav-link href="{{ route('control_posts.create') }}" :active="request()->routeIs('control_posts.create')">
                {{ __('Sukurti') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <livewire:post.index>

            </div>
        </div>
    </div>
</x-app-layout>
