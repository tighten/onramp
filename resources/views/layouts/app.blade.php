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
        <svg style="display:none;">
            <symbol id="icon-tighten-logo" viewBox="0 0 100 15">
                <g class="icon">
                    <path d="M10.77,7.76a.28.28,0,0,1-.28.28H8.75A1.63,1.63,0,0,0,7.12,9.67h0v1.74a.28.28,0,0,1-.28.28H6.32A.28.28,0,0,1,6,11.41V9.67A1.63,1.63,0,0,0,4.41,8H2.67a.28.28,0,0,1-.28-.28h0V7.24A.28.28,0,0,1,2.67,7H4.41A1.63,1.63,0,0,0,6,5.33H6V3.59a.28.28,0,0,1,.28-.28H6.8a.28.28,0,0,1,.28.28h0V5.33A1.63,1.63,0,0,0,8.67,7h1.82a.28.28,0,0,1,.28.28Zm1.82-4.4L7.16.23A1.28,1.28,0,0,0,6,.23L.58,3.37a1.28,1.28,0,0,0-.58,1v6.26a1.29,1.29,0,0,0,.58,1L6,14.77a1.28,1.28,0,0,0,1.16,0l5.42-3.13a1.28,1.28,0,0,0,.58-1V4.37a1.28,1.28,0,0,0-.58-1"/>
                </g>
                <g class="text" fill="currentColor">
                    <path d="M81.89,4.62H80.83V3.55h3.24V4.62H83v6.82H81.58c-.33,0-.39-.07-.53-.37L78.41,5h-.17v5.37H79.3v1.07H76V10.38h1.06V4.62H76V3.55h2.62c.33,0,.39.07.53.37l2.53,5.8h.17Z"/>
                    <polygon points="66.63 4.62 66.63 3.55 72.81 3.55 72.81 5.93 71.62 5.93 71.62 4.62 68.89 4.62 68.89 6.83 71.01 6.83 71.01 7.87 68.89 7.87 68.89 10.38 71.71 10.38 71.71 8.9 72.9 8.9 72.9 11.45 66.63 11.45 66.63 10.38 67.69 10.38 67.69 4.62 66.63 4.62"/>
                    <polygon points="61.84 10.38 61.84 11.45 58.4 11.45 58.4 10.38 59.51 10.38 59.51 4.62 57.88 4.62 57.88 6.16 56.69 6.16 56.69 3.55 63.54 3.55 63.54 6.16 62.36 6.16 62.36 4.62 60.72 4.62 60.72 10.38 61.84 10.38"/>
                    <polygon points="52.54 10.38 53.6 10.38 53.6 11.45 50.27 11.45 50.27 10.38 51.34 10.38 51.34 7.87 48.13 7.87 48.13 10.38 49.19 10.38 49.19 11.45 45.87 11.45 45.87 10.38 46.92 10.38 46.92 4.62 45.87 4.62 45.87 3.55 49.19 3.55 49.19 4.62 48.13 4.62 48.13 6.83 51.34 6.83 51.34 4.62 50.27 4.62 50.27 3.55 53.6 3.55 53.6 4.62 52.54 4.62 52.54 10.38"/>
                    <path d="M41.34,6c0-.94-.06-1.16-.15-1.25s-.16-.1-.5-.1h-2c-.35,0-.43,0-.51.1S38,5.22,38,7.5s0,2.61.16,2.72.16.1.51.1h2.09c.32,0,.43,0,.51-.1s.15-.44.15-1.43v-.4H39.75v-1h2.89V8.54c0,1.74-.11,2.21-.46,2.56a1.58,1.58,0,0,1-1.23.35H38.4c-.68,0-.94-.08-1.17-.32-.39-.39-.54-1-.54-3.63s.15-3.24.54-3.63c.24-.24.5-.32,1.17-.32h2.48a1.68,1.68,0,0,1,1.21.29c.36.36.45.79.47,2.19Z"/>
                    <polygon points="33.46 10.38 33.46 11.45 30.04 11.45 30.04 10.38 31.15 10.38 31.15 4.62 30.04 4.62 30.04 3.55 33.46 3.55 33.46 4.62 32.35 4.62 32.35 10.38 33.46 10.38"/>
                    <polygon points="25.22 10.38 25.22 11.45 21.78 11.45 21.78 10.38 22.9 10.38 22.9 4.62 21.26 4.62 21.26 6.16 20.07 6.16 20.07 3.55 26.92 3.55 26.92 6.16 25.74 6.16 25.74 4.62 24.1 4.62 24.1 10.38 25.22 10.38"/>
                </g>
            </symbol>
        </svg>

        <!-- header -->
        <header class="w-full px-6 bg-blue-500 text-white">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center">

                <a href="#" class="block py-6 w-full text-center md:text-left md:w-auto text-gray-dark no-underline flex justify-center items-center">
                    <svg><use xlink:href="#icon-tighten-logo"/></svg>
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
