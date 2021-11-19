<section x-data="{ open: false }"
    class="relative z-[999] lg:hidden">
    <button class="relative mr-4 focus:outline-none lg:hidden"
        aria-label="open menu"
        x-on:click="open = true">
        <div class="h-[2px] my-3 rounded w-8 bg-mint mobileMenuBtn"></div>
    </button>

    <div x-show="open"
        @click.away="open = false"
        class="absolute w-full max-h-[97vh] overflow-y-auto bg-blue-black pb-4">
        <div>
            @include('partials.navigation.header.main-nav')
        </div>

        <div>
            @auth
                <a class="block px-3 py-4 mx-1 font-bold transition-colors duration-300 ease-in-out border-t border-silver lg:border-none text-body lg:py-1 text-mint hover:text-white hover:no-underline"
                    href="{{ url_wlocale('preferences') }}">
                    <span>{{ __('Preferences') }}</span>
                </a>
            @endauth

            @include('partials.language-switcher')
        </div>

        <div class="px-4">
            @guest
                @include('partials.navigation.header.guest-menu')
            @else
                <a href="{{ route_wlocale('logout') }}"
                    class="block w-full px-4 py-1 mx-auto text-lg font-semibold text-center transition duration-150 ease-in-out bg-transparent border-2 hover:no-underline rounded-3xl text-blue-black bg-mint"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
