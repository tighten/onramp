<!-- header -->
{{--
    <div class="text-center px-6 py-2 bg-blue-200 border-blue-900 border-b">
        <p class="text-gray-dark">
            <span class="font-bold uppercase">NOTE:</span> This site is under active development, so it's not complete right now. Check out the <a href="{{ route_wlocale('dev') }}" class="font-bold hover:underline">dev page</a> to learn more.
        </p>
    </div>
    <header class="w-full px-6 text-white" style="background: #3f51d8">
        <div class="container mx-auto max-w-4xl sm:flex justify-between items-center">
            <a href="{{ url_wlocale('/') }}"
                class="block pt-6 pb-2 sm:py-6 flex-grow flex justify-left items-center">
                <img src="/images/onramp_logo.svg" alt="Onramp" class="max-w-xs w-full">
            </a>
            @include('partials.language-switcher')
        </div>
    </header> --}}
    <!-- /header -->

    <!-- nav -->
    {{-- <nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-light">
        <div
            class="container mx-auto py-2 max-w-4xl md:flex justify-between items-center text-sm md:text-base md:justify-start">
            <div
                class="w-full md:w-1/2 text-center md:text-left flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
                <a href="{{ url_wlocale('/') }}"
                    class="p-2 md:px-4 md:border-r border-gray-light">{{ __('Home') }}</a>
                <a href="{{ route_wlocale('modules.index') }}"
                    class="p-2 md:px-4 md:border-r border-gray-light">{{ __('Learn') }}</a>
                <a href="{{ route_wlocale('glossary') }}"
                    class="p-2 md:px-4">{{ __('Glossary') }}</a>
            </div>
            <div class="w-full mb-2 md:mb-0 md:w-1/2 text-center md:text-right">
                @guest
                    <a class="text-sm p-3" href="{{ route_wlocale('login') }}">{{ __('Log in') }}</a>
                    @if (Route::has('register'))
                        <a class="text-sm p-3" href="{{ route_wlocale('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ url_wlocale('home') }}" class="text-sm pr-4">{{ Auth::user()->name }}</a>
                    <a href="{{ url_wlocale('preferences') }}" class="text-sm pr-4">{{ __('Preferences') }}</a>

                    <a href="{{ route_wlocale('logout') }}"
                        class="text-sm p-3"
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

<header class="w-full bg-white border-blue-violet border-t-4 py-5 lg:border-t-8">
    <div class="fluid-container flex items-center md:px-12 xl:px-20 xxl:px-32">
        <div class="flex-1 inline-flex items-center justify-between lg:flex-initial">
            <a class="" href="{{ url_wlocale('/') }}">
                <img class="h-5 w-auto md:h-8" src="/images/logo/onramp.svg" alt="Onramp">
            </a>

            <button class="focus:outline-none lg:hidden"
                @click="openModal('mobileMenu')">
                <svg class="fill-current text-teal-600 h-5 w-auto duration-150 transition-colors hover:text-teal-700 md:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 20">
                    <g fill-rule="evenodd">
                        <rect width="25" height="3" rx="1.5"/>
                        <rect y="8" width="25" height="3" rx="1.5"/>
                        <rect y="17" width="25" height="3" rx="1.5"/>
                    </g>
                </svg>
            </button>
        </div>

        <div class="hidden flex-1 items-center justify-between pl-12 lg:flex">
            <div class="flex-1">
                <nav class="flex items-center">
                    <a
                        class="block font-semibold mx-4 text-blue-violet text-xl hover:no-underline"
                        href="{{ route_wlocale('modules.index') }}">
                        <span>Learn</span>
                    </a>

                    <a
                        class="block font-semibold mx-4 text-blue-violet text-xl hover:no-underline"
                        href="{{ route_wlocale('glossary')}} ">
                        <span>Glossary</span>
                    </a>
                </nav>
            </div>

            <div class="flex flex-1 items-center justify-end">
                @include('partials.language-switcher')

                <div class="flex items-center ml-12">
                    @guest
                        <a class="border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 rounded-md text-center text-teal-600 text-lg whitespace-no-wrap hover:no-underline" href="{{ route_wlocale('login') }}">
                            <span>{{ __('Log in') }}</span>
                        </a>

                        @if (Route::has('register'))
                            <a
                                class="bg-teal-600 border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 rounded-md text-center text-white text-lg whitespace-no-wrap hover:no-underline"
                                href="{{ route_wlocale('register') }}">
                                <span>{{ __('Register') }}</span>
                            </a>
                        @endif
                    @else
                        <a class="block bg-teal-600 flex h-12 items-center justify-center rounded-full w-12 hover:no-underline"
                            href="{{ url_wlocale('home') }}">
                            <span class="font-semibold leading-none text-white">
                                {{ Auth::user()->initials() }}
                            </span>
                        </a>
                        {{-- @todo Remove this --}}
                        <a href="{{ route_wlocale('logout') }}"
                        class="text-sm p-3"
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
                class="block border-t border-gray-300 font-semibold p-6 text-blue-violet text-xl hover:no-underline"
                href="{{ route_wlocale('modules.index') }}">
                <span>Learn</span>
            </a>

            <a
                class="block border-t border-gray-300 font-semibold p-6 text-blue-violet text-xl hover:no-underline"
                href="{{ route_wlocale('glossary')}} ">
                <span>Glossary</span>
            </a>
        </template>

        <template slot="subnavigation-links">
            @auth
                <a class="block font-semibold px-6 py-3 text-blue-violet text-base hover:no-underline" href="{{ url_wlocale('preferences') }}">
                    <span>{{ __('Preferences') }}</span>
                </a>
            @endauth

            @include('partials.language-switcher')
        </template>

        <template slot="navigation-buttons">
            @guest
                <a class="border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 text-center text-teal-600 text-lg whitespace-no-wrap hover:no-underline" href="{{ route_wlocale('login') }}">
                    <span>{{ __('Log in') }}</span>
                </a>

                @if (Route::has('register'))
                <a class="bg-teal-600 border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 text-center text-white text-lg whitespace-no-wrap hover:no-underline" href="{{ route_wlocale('register') }}">
                    <span>{{ __('Register') }}</span>
                </a>
                @endif
            @else
                <a class="border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 text-center text-teal-600 text-lg whitespace-no-wrap hover:no-underline" href="{{ route_wlocale('home') }}">
                    <span>{{ __('My Modules') }}</span>
                </a>

                <a href="{{ route_wlocale('logout') }}"
                    class="bg-teal-600 border-2 border-teal-600 flex-1 font-semibold inline-block leading-none mx-2 px-8 py-3 text-center text-white text-lg whitespace-no-wrap hover:no-underline"
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
