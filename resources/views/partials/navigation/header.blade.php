<!--sitewide-banner>
    <template v-slot:message>
        <span class="font-semibold uppercase">{{ __('NOTE:') }}</span> {{ __("This site is under active development, so it's not complete right now. Check out the") }} <a href="{{ route_wlocale('dev') }}" class="font-semibold hover:underline">{{ __('dev page') }}</a> {{ __('to learn more.')}}
    </template>
</sitewide-banner-->

<header class="w-full py-5 bg-white border-t-4 border-blue-violet lg:border-t-8">
    <div class="flex items-center fluid-container md:px-12 xl:px-20 xxl:px-32">
        <div class="inline-flex items-center justify-between flex-1 lg:flex-initial">
            <a class="" href="{{ url_wlocale('/') }}">
                <img class="w-auto h-5 md:h-8" src="/images/logo/onramp.svg" alt="Onramp">
            </a>

            <button
                class="focus:outline-none lg:hidden"
                aria-label="open menu"
                @click="openModal('mobileMenu')"
            >
                <svg class="w-auto h-5 text-teal-700 transition-colors duration-150 fill-current hover:text-teal-700 md:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 20">
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
                        class="block mx-1 text-xl font-semibold transition-colors duration-300 ease-in-out text-blue-violet hover:text-white hover:bg-indigo-700 hover:no-underline px-3 py-1 rounded @if (Route::currentRouteName() === 'modules.index') bg-indigo-100 @endif"
                        href="{{ route_wlocale('modules.index') }}">
                        <span>{{ __('Learn') }}</span>
                    </a>

                    <a
                        class="block mx-1 text-xl font-semibold transition-colors duration-300 ease-in-out text-blue-violet hover:text-white hover:bg-indigo-700 hover:no-underline px-3 py-1 rounded @if (Route::currentRouteName() === 'glossary') bg-indigo-100 @endif"
                        href="{{ route_wlocale('glossary') }}">
                        <span>{{ __('Glossary') }}</span>
                    </a>
                    <a
                        class="block mx-1 text-xl font-semibold transition-colors duration-300 ease-in-out text-blue-violet hover:text-white hover:bg-indigo-700 hover:no-underline px-3 py-1 rounded @if (Route::currentRouteName() === 'tracks') bg-indigo-100 @endif"
                        href="{{ route_wlocale('tracks') }}">
                        <span>{{ __('Tracks') }}</span>
                    </a>
                </nav>
            </div>

            <div class="flex items-center justify-end flex-1">
                @include('partials.language-switcher')

                <div class="flex items-center ml-12">
                    @guest
                        <a
                            class="flex-1 inline-block px-8 py-3 mx-2 text-lg font-semibold leading-none text-center text-teal-700 whitespace-no-wrap transition duration-150 ease-in-out border-2 border-teal-700 rounded-md hover:no-underline hover:bg-teal-700 hover:text-white focus:outline-none focus:shadow-outline active:bg-teal-800 active:border-teal-800 active:text-white"
                            href="{{ route_wlocale('login') }}">
                            <span>{{ __('Log in') }}</span>
                        </a>

                        @if (Route::has('register'))
                            <a
                                class="flex-1 inline-block px-8 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap transition duration-150 ease-in-out bg-teal-700 border-2 border-teal-700 rounded-md hover:no-underline hover:bg-teal-600 hover:border-teal-600 focus:outline-none focus:shadow-outline active:bg-teal-800 active:border-teal-800"
                                href="{{ route_wlocale('register') }}">
                                <span>{{ __('Register') }}</span>
                            </a>
                        @endif
                    @else
                        <menu-dropdown>
                            <template v-slot:toggle="props">
                                <button
                                    class="flex items-center justify-center block w-12 h-12 hover:no-underline focus:outline-none"
                                    @click="props.toggle"
                                >
                                    <img class="rounded-full" src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }}">
                                </button>
                            </template>

                            <menu-dropdown-item
                                text="{{ __('Profile') }}"
                                href="{{ route_wlocale('user.profile.show') }}">
                            </menu-dropdown-item>

                            <menu-dropdown-item
                                text="{{ __('Preferences') }}"
                                href="{{ route_wlocale('user.preferences.index') }}">
                            </menu-dropdown-item>

                            <menu-dropdown-item
                                text="{{ __('Log out') }}"
                                href="{{ route_wlocale('logout') }}"
                                :logout="true">
                            </menu-dropdown-item>
                        </menu-dropdown>

                        <form
                            id="logout-form"
                            action="{{ route_wlocale('logout') }}"
                            method="POST"
                            class="hidden"
                        >
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
                <span>{{ __('Learn') }}</span>
            </a>

            <a
                class="block p-6 text-xl font-semibold border-t border-gray-300 text-blue-violet hover:no-underline"
                href="{{ route_wlocale('glossary') }} ">
                <span>{{ __('Glossary') }}</span>
            </a>

            <a
                class="block p-6 text-xl font-semibold border-t border-gray-300 text-blue-violet hover:no-underline"
                href="{{ route_wlocale('tracks') }} ">
                <span>{{ __('Tracks') }}</span>
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
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-teal-700 whitespace-no-wrap border-2 border-teal-700 hover:no-underline" href="{{ route_wlocale('login') }}">
                    <span>{{ __('Log in') }}</span>
                </a>

                @if (Route::has('register'))
                <a class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap bg-teal-700 border-2 border-teal-700 hover:no-underline" href="{{ route_wlocale('register') }}">
                    <span>{{ __('Register') }}</span>
                </a>
                @endif
            @else
                <a href="{{ route_wlocale('logout') }}"
                    class="flex-1 inline-block w-1/2 py-3 mx-2 text-lg font-semibold leading-none text-center text-white whitespace-no-wrap bg-teal-700 border-2 border-teal-700 hover:no-underline"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span>{{ __('Log out') }}</span>
                </a>
                <form id="logout-form"
                    action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </template>
    </modal-mobile-menu>
</header>
