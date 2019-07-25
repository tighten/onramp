{{-- Template from https://templates.digizu.co.uk/ --}}<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta property="og:title" content="{{ $ogTitle ?? 'Onramp to Laravel' }}">
        <meta property="og:type" content="{{ $ogType ?? 'website' }}">
        <meta property="og:url" content="{{ $ogUrl ?? 'https://onramp.dev' }}">
        {{-- <meta property="og:image" content="{{ $ogImage ?? 'change-me.jpg' }}"> --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <!-- header -->
        <header class="w-full px-6 text-white" style="background: #3f51d8">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center">
                <a href="#" class="block py-6 w-full text-center md:text-left flex justify-left items-center">
                    <img src="/images/onramp_logo.svg" alt="Onramp">
                </a>

                <div class="w-full md:w-auto text-center md:text-right">
                    <svg><use xlink:href="#icon-tighten-logo"/></svg>
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- nav -->
        <nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-light">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
                <div class="w-full md:w-1/2 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
                    <a href="/" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-900 no-underline hover:underline md:border-r border-gray-light">Home</a>
                    <a href="/learn" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-900 no-underline hover:underline">Learn</a>
                </div>
                <div class="w-full md:w-1/2 text-center md:text-right">

                    @guest
                        <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="/home" class="text-gray-900 text-sm pr-4 no-underline hover:underline">{{ Auth::user()->name }}</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline text-gray-900 text-sm p-3"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
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
                <p>From the lovely folks at <a href="https://tighten.co/">Tighten.</a></p>
                <div class="pt-4 md:p-0 text-center md:text-right text-xs">
                    <a href="https://github.com/tightenco/onramp" class="text-black no-underline hover:underline">Source &amp; Roadmap</a>
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
