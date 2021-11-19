<!--sitewide-banner>
    <template v-slot:message>
        <span class="font-semibold uppercase">{{ __('NOTE:') }}</span> {{ __("This site is under active development, so it's not complete right now. Check out the") }} <a href="{{ route_wlocale('dev') }}" class="font-semibold hover:underline">{{ __('dev page') }}</a> {{ __('to learn more.') }}
    </template>
</sitewide-banner-->

<div class="flex items-center fluid-container md:px-12 xl:px-20 2xl:px-32">
    @include('partials.navigation.header.logo')
    <div class="items-center justify-between flex-1 hidden pl-12 lg:flex">
        <div class="flex-1">
            @include('partials.navigation.header.main-nav')
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
                    @include('partials.navigation.header.auth-menu')

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
