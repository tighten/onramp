<modal-mobile-menu :show="modals.mobileMenu">
    <template slot="navigation-links">
        <a class="block p-6 text-xl font-semibold border-t border-silver text-teal hover:no-underline"
            href="{{ route_wlocale('modules.index') }}">
            <span>{{ __('Learn') }}</span>
        </a>

        <a class="block p-6 text-xl font-semibold border-t border-silver text-violet hover:no-underline"
            href="{{ route_wlocale('glossary') }} ">
            <span>{{ __('Glossary') }}</span>
        </a>

        <a class="block p-6 text-xl font-semibold border-t border-silver text-violet hover:no-underline"
            href="{{ route_wlocale('tracks') }} ">
            <span>{{ __('Tracks') }}</span>
        </a>
    </template>

    <template slot="subnavigation-links">
        @auth
            <a class="block px-6 py-3 text-base font-semibold text-violet hover:no-underline"
                href="{{ url_wlocale('preferences') }}">
                <span>{{ __('Preferences') }}</span>
            </a>
        @endauth

        @include('partials.language-switcher')
    </template>

    <template slot="navigation-buttons">
        @guest
            <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center whitespace-no-wrap border-2 text-teal border-teal hover:no-underline"
                href="{{ route_wlocale('login') }}">
                <span>{{ __('Log in') }}</span>
            </a>

            @if (Route::has('register'))
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap border-2 bg-teal border-teal hover:no-underline"
                    href="{{ route_wlocale('register') }}">
                    <span>{{ __('Register') }}</span>
                </a>
            @endif
        @else
            <a href="{{ route_wlocale('logout') }}"
                class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap border-2 bg-teal border-teal hover:no-underline"
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
