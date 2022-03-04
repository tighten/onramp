<div x-data="{isMenuOpen: false, toggle() { this.isMenuOpen = !this.isMenuOpen}}"
    class="relative px-4 lg:hidden"
    x-cloak
    v-pre>
    <div class="flex items-center justify-between w-full">
        <a href="{{ route_wlocale('welcome') }}">
            @include('partials.svg.logo-nav')
        </a>

        <button x-on:click="toggle()"
            aria-label="Main Menu"
            type="button"
            class="relative transition duration-300 ease-in-out mobileMenuBtn"
            x-bind:class="isMenuOpen ? 'isActive' : ''">
            <div class="h-[2px] my-3 rounded w-8 bg-mint"
                x-bind:class="isMenuOpen ? 'invisible' : 'visible'">
            </div>
        </button>
    </div>

    <div x-show="isMenuOpen"
        x-cloak
        x-on:click.away="isMenuOpen = false"
        class="absolute left-0 top-[45px] w-full min-h-[75vh] overflow-y-auto  bg-blue-black pb-4 z-[-1]"
        x-transition:enter="transition-all ease-in duration-200 origin-top"
        x-transition:enter-start="opacity-0 transform scale-y-0"
        x-transition:enter-end="opacity-100 transform scale-y-100"
        x-transition:leave="transition-all ease-out duration-200 origin-top"
        x-transition:leave-start="opacity-100 transform scale-y-100"
        x-transition:leave-end="opacity-0 transform scale-y-0">
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

        <div class="absolute w-full px-4 bottom-6 absolute-x-center">
            @guest
                @include('partials.navigation.header.guest-menu')
            @else
                <a href="{{ route_wlocale('logout') }}"
                    class="block w-full px-4 py-1 mx-auto text-lg font-semibold text-center transition duration-200 ease-in-out bg-transparent border-2 hover:no-underline rounded-3xl text-blue-black bg-mint"
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
        <div class="fixed z-[-2] top-0 left-0 opacity-70 flex items-center justify-center w-full inset-0  bg-black"
            x-show="isMenuOpen"></div>
    </div>

</div>
