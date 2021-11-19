<!--sitewide-banner>
    <template v-slot:message>
        <span class="font-semibold uppercase">{{ __('NOTE:') }}</span> {{ __("This site is under active development, so it's not complete right now. Check out the") }} <a href="{{ route_wlocale('dev') }}" class="font-semibold hover:underline">{{ __('dev page') }}</a> {{ __('to learn more.') }}
    </template>
</sitewide-banner-->

<header class="w-full py-5 border-t-4 bg-blue-black border-violet lg:border-t-8">
    <div class="flex items-center fluid-container md:px-12 xl:px-20 2xl:px-32">
        <div class="inline-flex items-center justify-between flex-1 lg:flex-initial">
            <a class=""
                href="{{ url_wlocale('/') }}">
                <img class="w-auto h-5 md:h-8"
                    src="/images/logo/onramp.svg"
                    alt="Onramp">
            </a>

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
        </div>

        <div class="items-center justify-between flex-1 hidden pl-12 lg:flex">
            <div class="flex-1">
                <nav class="flex items-center">
                    <a class="block mx-1 text-body font-semibold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
                        {{ Route::currentRouteName() === 'modules.index' ? 'border-2 border-mint rounded-3xl' : '' }}"
                        href="{{ route_wlocale('modules.index') }}">
                        <span>{{ __('Learn') }}</span>
                    </a>

                    <a class="block mx-1 text-body font-bold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
                        {{ Route::currentRouteName() === 'glossary' ? 'border-2 border-mint rounded-3xl' : '' }}"
                        href="{{ route_wlocale('glossary') }}">
                        <span>{{ __('Glossary') }}</span>
                    </a>
                    <a class="block mx-1 text-body font-bold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
                        {{ Route::currentRouteName() === 'tracks' ? 'border-2 border-mint rounded-3xl' : '' }}"
                        href="{{ route_wlocale('tracks') }}">
                        <span>{{ __('Tracks') }}</span>
                    </a>
                </nav>
            </div>

            <div class="flex items-center justify-end flex-1">
                @include('partials.language-switcher')

                <div class="flex items-center ml-12">
                    @guest
                        <a class="flex-1 inline-block px-4 py-1 mx-2 text-lg font-semibold text-center transition duration-150 ease-in-out bg-transparent border-2 hover:no-underline rounded-3xl text-mint border-mint hover:bg-mint hover:text-blue-black"
                            href="{{ route_wlocale('login') }}">
                            <span>{{ __('Log in') }}</span>
                        </a>

                        @if (Route::has('register'))
                            <a class="flex-1 inline-block px-4 py-1 mx-2 text-lg font-semibold text-center transition duration-150 ease-in-out border-2 under rounded-3xl border-mint bg-mint hover:no-underline hover:bg-transparent hover:text-mint"
                                href="{{ route_wlocale('register') }}">
                                <span>{{ __('Register') }}</span>
                            </a>
                        @endif
                    @else
                        <menu-dropdown>
                            <template v-slot:toggle="props">
                                <button
                                    class="flex items-center justify-center w-12 h-12 hover:no-underline focus:outline-none"
                                    @click="props.toggle">
                                    <img class="rounded-full"
                                        src="{{ auth()->user()->profile_picture }}"
                                        alt="{{ auth()->user()->name }}">
                                </button>
                            </template>

                            <menu-dropdown-item text="{{ __('Profile') }}"
                                href="{{ route_wlocale('user.profile.show') }}">
                            </menu-dropdown-item>

                            <menu-dropdown-item text="{{ __('Preferences') }}"
                                href="{{ route_wlocale('user.preferences.index') }}">
                            </menu-dropdown-item>

                            <menu-dropdown-item text="{{ __('Log out') }}"
                                href="{{ route_wlocale('logout') }}"
                                :logout="true">
                            </menu-dropdown-item>
                        </menu-dropdown>

                        <form id="logout-form"
                            action="{{ route_wlocale('logout') }}"
                            method="POST"
                            class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    @include('partials.navigation.mobile-header')
</header>
