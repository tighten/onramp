<!--sitewide-banner>
    <template v-slot:message>
        <span class="font-semibold uppercase">{{ __('NOTE:') }}</span> {{ __("This site is under active development, so it's not complete right now. Check out the") }} <a href="{{ route_wlocale('dev') }}" class="font-semibold hover:underline">{{ __('dev page') }}</a> {{ __('to learn more.') }}
    </template>
</sitewide-banner-->

<div class="container items-center hidden lg:flex">
    <a href="{{ route_wlocale('welcome') }}" class="ml-4">
        @include('partials.svg.logo-nav')
    </a>

    <div class="items-center justify-between flex-1 hidden pl-12 lg:flex">
        <div class="flex-1">
            <nav class="flex items-center">
                @include('partials.navigation.header.main-nav')
            </nav>
        </div>

        <div class="flex items-center justify-end flex-1">
            {{--@include('partials.language-switcher')--}}
            <div v-pre>
                @include('partials.alpine-language-switcher')
            </div>

            <div class="flex items-center ml-12">
                @guest
                @include('partials.navigation.header.guest-menu')
                @else
                @include('partials.navigation.header.auth-menu')

                <form id="logout-form" action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
                @endguest
            </div>
        </div>
    </div>
</div>
