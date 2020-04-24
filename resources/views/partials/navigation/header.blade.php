<!-- header -->
{{--
    <div class="px-6 py-2 text-center bg-blue-200 border-b border-blue-900">
        <p class="text-gray-dark">
            <span class="font-bold uppercase">NOTE:</span> This site is under active development, so it's not complete right now. Check out the <a href="{{ route_wlocale('dev') }}" class="font-bold hover:underline">dev page</a> to learn more.
        </p>
    </div>
    <header class="w-full px-6 text-white" style="background: #3f51d8">
        <div class="container items-center justify-between max-w-4xl mx-auto sm:flex">
            <a href="{{ url_wlocale('/') }}"
                class="flex items-center flex-grow block pt-6 pb-2 sm:py-6 justify-left">
                <img src="/images/onramp_logo.svg" alt="Onramp" class="w-full max-w-xs">
            </a>
            @include('partials.language-switcher')
        </div>
    </header> --}}
    <!-- /header -->

    <!-- nav -->
    {{-- <nav class="relative z-20 w-full px-6 bg-white border-t border-b md:pt-0 border-gray-light">
        <div
            class="container items-center justify-between max-w-4xl py-2 mx-auto text-sm md:flex md:text-base md:justify-start">
            <div
                class="flex flex-wrap items-stretch justify-center w-full text-center md:w-1/2 md:text-left md:justify-start md:items-start">
                <a href="{{ url_wlocale('/') }}"
                    class="p-2 md:px-4 md:border-r border-gray-light">{{ __('Home') }}</a>
                <a href="{{ route_wlocale('modules.index') }}"
                    class="p-2 md:px-4 md:border-r border-gray-light">{{ __('Learn') }}</a>
                <a href="{{ route_wlocale('glossary') }}"
                    class="p-2 md:px-4">{{ __('Glossary') }}</a>
            </div>
            <div class="w-full mb-2 text-center md:mb-0 md:w-1/2 md:text-right">
                @guest
                    <a class="p-3 text-sm" href="{{ route_wlocale('login') }}">{{ __('Log in') }}</a>
                    @if (Route::has('register'))
                        <a class="p-3 text-sm" href="{{ route_wlocale('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ url_wlocale('home') }}" class="pr-4 text-sm">{{ Auth::user()->name }}</a>
                    <a href="{{ url_wlocale('preferences') }}" class="pr-4 text-sm">{{ __('Preferences') }}</a>

                    <a href="{{ route_wlocale('logout') }}"
                        class="p-3 text-sm"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </nav>
--}}
<!-- /nav -->

<header class="w-full py-5 bg-white border-t-4 border-blue-violet lg:border-t-8">
    <div class="flex items-center fluid-container md:px-12 xl:px-20 xxl:px-32">
        <div class="inline-flex items-center justify-between flex-1 lg:flex-initial">
            <a class="" href="{{ url_wlocale('/') }}">
                <img class="w-auto h-5 md:h-8" src="/images/logo/onramp.svg" alt="Onramp">
            </a>

            <button class="focus:outline-none lg:hidden"
                @click="openModal('mobileMenu')">
                <svg class="w-auto h-5 text-teal-600 fill-current duration-150 transition-colors hover:text-teal-700 md:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 20">
                    <g fill-rule="evenodd">
                        <rect width="25" height="3" rx="1.5"/>
                        <rect y="8" width="25" height="3" rx="1.5"/>
                        <rect y="17" width="25" height="3" rx="1.5"/>
                    </g>
                </svg>
            </button>
        </div>

        <div class="items-center justify-between flex-1 hidden pl-12 lg:flex">
            <div class="flex-1">
                <nav class="flex items-center">
                    <a
                        class="block mx-4 text-xl font-semibold text-blue-violet hover:no-underline"
                        href="{{ route_wlocale('modules.index') }}">
                        <span>Learn</span>
                    </a>

                    <a
                        class="block mx-4 text-xl font-semibold text-blue-violet hover:no-underline"
                        href="{{ route_wlocale('glossary')}} ">
                        <span>Glossary</span>
                    </a>
                </nav>
            </div>

            <div class="flex items-center justify-end flex-1">
                @include('partials.language-switcher')

                <div class="flex items-center ml-12">
                    @guest
                        <a class="flex-1 inline-block px-8 py-3 mx-2 text-lg font-semibold leading-none text-center text-teal-600 whitespace-no-wrap border-2 border-teal-600 rounded-md hover:no-underline" href="{{ route_wlocale('login') }}">
                            <span>{{ __('Log in') }}</span>
                        </a>

                        @if (Route::has('register'))
                            <a
                                class="flex-1 inline-block px-8 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap bg-teal-600 border-2 border-teal-600 rounded-md hover:no-underline"
                                href="{{ route_wlocale('register') }}">
                                <span>{{ __('Register') }}</span>
                            </a>
                        @endif
                    @else
                        <a class="flex items-center justify-center block w-12 h-12 bg-teal-600 rounded-full hover:no-underline"
                            href="{{ url_wlocale('home') }}">
                            <span class="font-semibold leading-none text-white">
                                {{ Auth::user()->initials }}
                            </span>
                        </a>
                        {{-- @todo Remove this --}}
                        <a href="{{ route_wlocale('logout') }}"
                        class="p-3 text-sm"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <modal-mobile-menu :show="modals.mobileMenu">
        <template slot="navigation-links">
            <a
                class="block p-6 text-xl font-semibold border-t border-gray-300 text-blue-violet hover:no-underline"
                href="{{ route_wlocale('modules.index') }}">
                <span>Learn</span>
            </a>

            <a
                class="block p-6 text-xl font-semibold border-t border-gray-300 text-blue-violet hover:no-underline"
                href="{{ route_wlocale('glossary')}} ">
                <span>Glossary</span>
            </a>
        </template>

        <template slot="subnavigation-links">
            @auth
                <a class="block px-6 py-3 text-base font-semibold text-blue-violet hover:no-underline" href="{{ url_wlocale('preferences') }}">
                    <span>{{ __('Preferences') }}</span>
                </a>
            @endauth

            @include('partials.language-switcher')
        </template>

        <template slot="navigation-buttons">
            @guest
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-teal-600 whitespace-no-wrap border-2 border-teal-600 hover:no-underline" href="{{ route_wlocale('login') }}">
                    <span>{{ __('Log in') }}</span>
                </a>

                @if (Route::has('register'))
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap bg-teal-600 border-2 border-teal-600 hover:no-underline" href="{{ route_wlocale('register') }}">
                    <span>{{ __('Register') }}</span>
                </a>
                @endif
            @else
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-teal-600 whitespace-no-wrap border-2 border-teal-600 hover:no-underline" href="{{ route_wlocale('home') }}">
                    <span>{{ __('My Modules') }}</span>
                </a>

                <a href="{{ route_wlocale('logout') }}"
                    class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap bg-teal-600 border-2 border-teal-600 hover:no-underline"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form"
                    action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </template>
    </modal-mobile-menu>
</header>
