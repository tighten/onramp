{{-- Template from https://templates.digizu.co.uk/ --}}<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta property="og:title" content="{{ $ogTitle ?? __('Onramp to Laravel') }}">
        <meta property="og:type" content="{{ $ogType ?? 'website' }}">
        <meta property="og:url" content="{{ $ogUrl ?? 'https://onramp.dev' }}">
        <meta property="og:image" content="{{ $ogImage ?? '/images/opengraph_logo.png' }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>{{ isset($pageTitle) ? "{$pageTitle} | " : '' }}{{ __('Onramp to Laravel') }}</title>
    </head>
    <body>
        <!-- header -->
        <header class="w-full px-6 text-white" style="background: #3f51d8">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center">
                <a href="{{ url_wlocale('/') }}" class="block py-6 w-full text-center md:text-left flex justify-left items-center">
                    <img src="/images/onramp_logo.svg" alt="Onramp" class="max-w-xs w-full">
                </a>
                <div class="text-white text-center md:text-right md:w-40">
                @foreach (Facades\App\Localization\Locales::all() as $thisLocale)
                    <a href="{{ switch_locale($thisLocale) }}" class="no-underline hover:underline text-white text-sm p-3{{ $thisLocale === $locale ? ' font-bold' : '' }}">{{ strtoupper($thisLocale) }}</a>
                    @if (! $loop->last)
                    <span class="text-gray-400">|</span>
                    @endif
                @endforeach
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- nav -->
        <nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-light">
            <div class="container mx-auto py-4 max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
                <div class="w-full md:w-1/2 text-center md:text-left flex flex-wrap justify-center items-stretch md:justify-start md:items-start mb-4 md:mb-0">
                    <a href="{{ url_wlocale('/') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-900 no-underline hover:underline md:border-r border-gray-light">{{ __('Home') }}</a>
                    <a href="{{ url_wlocale('learn') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-900 no-underline hover:underline">{{ __('Learn') }}</a>
                </div>
                <div class="w-full md:w-1/2 text-center md:text-right">
                    @guest
                        <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route_wlocale('login') }}">{{ __('Log in') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route_wlocale('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ url_wlocale('home') }}" class="text-gray-900 text-sm pr-4 no-underline hover:underline">{{ Auth::user()->name }}</a>

                        <a href="{{ route_wlocale('logout') }}"
                           class="no-underline hover:underline text-gray-900 text-sm p-3"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route_wlocale('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>

            </div>
        </nav>
        <!-- /nav -->

        <!-- blog -->
        @yield('content')
        <!-- /blog -->

        <!-- footer -->
        <footer class="w-full bg-white px-6 border-t">
            <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
                <p>{{ __('From the lovely folks at') }} <a href="https://tighten.co/">Tighten.</a></p>
                <div class="pt-4 md:p-0 text-center md:text-right text-xs">
                    <a href="https://github.com/tightenco/onramp" class="text-black no-underline hover:underline">{{ __('Source & Roadmap') }}</a>
                    {{--
                    <a href="#" class="text-black no-underline hover:underline ml-4">Terms &amp; Conditions</a>
                    <a href="#" class="text-black no-underline hover:underline ml-4">Contact Us</a>
                    --}}
                </div>
            </div>
        </footer>
        <!-- /footer -->
    </body>
</html>
