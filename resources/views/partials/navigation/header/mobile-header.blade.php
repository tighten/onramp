<section x-data="{ open: false }">
    <button class="relative mr-4 focus:outline-none lg:hidden"
        aria-label="open menu"
        x-on:click="open = true">
        <div class="h-[2px] my-3 rounded w-8 bg-mint mobileMenuBtn"></div>
    </button>

    <div x-show="open"
        @click.away="open = false">
        <div>
            @include('partials.navigation.header.main-nav')
        </div>

        <div>
            @auth
                <a class="block px-6 pb-4 mb-3 font-bold border-b text-body text-mint hover:no-underline border-silver"
                    href="{{ url_wlocale('preferences') }}">
                    <span>{{ __('Preferences') }}</span>
                </a>
            @endauth

            @include('partials.language-switcher')
        </div>

        <div>
            @guest
                <a class="flex-1 inline-block px-4 py-1 mx-2 text-lg font-bold text-center transition duration-150 ease-in-out bg-transparent border-2 hover:no-underline rounded-3xl text-mint border-mint hover:bg-mint hover:text-blue-black"
                    href="{{ route_wlocale('login') }}">
                    <span>{{ __('Log in') }}</span>
                </a>

                @if (Route::has('register'))
                    <a class="flex-1 inline-block px-4 py-1 mx-2 text-lg font-bold text-center transition duration-150 ease-in-out border-2 under rounded-3xl border-mint bg-mint hover:no-underline hover:bg-transparent hover:text-mint"
                        href="{{ route_wlocale('register') }}">
                        <span>{{ __('Register') }}</span>
                    </a>
                    </a>
                @endif
            @else
                <a href="{{ route_wlocale('logout') }}"
                    class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-bold leading-none text-center text-white whitespace-no-wrap border-2 bg-mint border-mint hover:no-underline"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <span>{{ __('Log out') }}</span>
                </a>
                <form id="logout-form"
                    action="{{ route_wlocale('logout') }}"
                    method="POST"
                    class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
    </div>
</section>

{{-- <div x-data="{ open: false }"
    x-description="Mobile menu, toggle classes based on menu state."
    class="relative w-full py-4 text-center text-white transition ease-in opacity-0 e duration-400 lg:hidden h-75">
    <div class="flex items-center justify-between px-4">
        <div class="flex items-center">
            <button x-on:click="open = true"
                aria-label="Main Menu"
                type="button"
                class="relative mr-4 text-white mobileMenuBtn"
                x-bind:class="open ?'isActive' : ''">
                button!!!!
            </button>

            <div class="fixed z-[-1] top-0 left-0 flex items-center justify-center w-full  bg-black bg-opacity-50"
                x-show="open"></div>


        </div>

        <div class="flex items-center text-navy">
            <div class="mr-px">
            </div>

        </div>
    </div>
    <div x-show="open">

        wweeeeyyyooo


    </div>
</div> --}}
