<modal-mobile-menu :show="modals.mobileMenu">
    <template slot="navigation-links">
        <a class="block p-6 font-bold border-t text-body border-silver text-mint hover:no-underline"
            href="{{ route_wlocale('modules.index') }}">
            <span>{{ __('Learn') }}</span>
        </a>

        <a class="block p-6 font-bold border-t text-body border-silver text-mint hover:no-underline"
            href="{{ route_wlocale('glossary') }} ">
            <span>{{ __('Glossary') }}</span>
        </a>

        <a class="block p-6 font-bold border-t text-body border-silver text-mint hover:no-underline"
            href="{{ route_wlocale('tracks') }} ">
            <span>{{ __('Tracks') }}</span>
        </a>
    </template>

    <template slot="subnavigation-links">
        @auth
            <a class="block px-6 py-3 text-base font-bold text-mint hover:no-underline"
                href="{{ url_wlocale('preferences') }}">
                <span>{{ __('Preferences') }}</span>
            </a>
        @endauth

        @include('partials.language-switcher')
    </template>

    <template slot="navigation-buttons">
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
    </template>
</modal-mobile-menu>



<button class="relative mr-4 focus:outline-none lg:hidden"
                aria-label="open menu"
                @click="openModal('mobileMenu')">
                <div class="h-[2px] my-3 rounded w-8 bg-mint mobileMenuBtn">
                </div>
            </button>
            {{-- <button @click="openModal('mobileMenu')
                aria-label="
                open
                menu"
                type="button"
                class="relative mr-4 mobileMenuBtn focus:outline-none lg:hidden"
                :class="openModal('mobileMenu') ? 'isActive' : ''">
                <div class="h-[2px] my-3 rounded w-8 bg-mint"
                    :class="openModal('mobileMenu') ? 'invisible' : 'visible'">
                </div>
            </button> --}}
