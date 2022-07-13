<nav class="bg-gray-800 p-2 mt-0 fixed w-full z-10 top-0">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="{{ route('home') }}">
                <span class="text-2xl pl-2"><i class="em em-grinning"></i> Naujienų portalas</span>
            </a>
        </div>
        <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                @auth
                    {{-- Dashboard --}}
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-white no-underline hover:text-gray-800 hover:text-underline" href="{{ route('dashboard.index') }}" >{{ __('Valdymo skydas') }}</a>
                    </li>

                    <li class="mr-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Log Out') }}</a></li>
                                </form>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-white no-underline hover:text-gray-800 hover:text-underline" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-white no-underline hover:text-gray-800 hover:text-underline" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
