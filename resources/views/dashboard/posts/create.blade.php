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


    <div class="py-12 col-12" >
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="p-6">

                    <x-form action="{{ route('posts.store') }}">
                        <div class="space-y-6">

                            <div>
                                <x-jet-label for="title" value="{{ __('Pavadinimas') }}" />
                                <x-jet-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('pavadinimas')" autofocus autocomplete="title" />
                                <x-jet-input-error for="title" class="mt-2" />
                                <small>Iki 50 simboliu</small>
                            </div>

                            <div>
                                <x-trix name="body" styling="overflow-y-scroll h-96"></x-trix>
                                <x-jet-input-error for="body" class="mt-2" />
                            </div>

                            <div>
                                <x-jet-label for="categories" value="{{ __('Kategorijos') }}" />
                                <select name="categories[]" id="create-post" multiple x-data="{}" x-init="function () { choices($el) }">
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-jet-label for="meta_description" value="{{ __('Trumpas aprašymas') }}" />
                                <x-trix name="meta_description" styling="overflow-y-scroll h-40"></x-trix>
                                <x-jet-input-error for="meta_description" class="mt-2" />
                                <small>Iki 150 simboliu</small>
                            </div>

                        </div>


                        <x-jet-button class="mt-12">
                            {{ __('Sukurti') }}
                        </x-jet-button>

                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
