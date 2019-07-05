{{-- Template from https://templates.digizu.co.uk/ --}}<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>
    <body>
        <!-- header -->
        <header class="w-full px-6 bg-white">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center">
                <a href="#" class="block py-6 w-full text-center md:text-left md:w-auto text-gray-dark no-underline flex justify-center items-center">
                    Onramp to Laravel
                </a>
                <div class="w-full md:w-auto text-center md:text-right">
                    <!-- Login / Regsiter -->
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- nav -->
        <nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-light">
            <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
                <div class="w-full md:w-1/2 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
                    <a href="/" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-light">Home</a>
                    <a href="/learn" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Learn</a>
                </div>
                <div class="w-full md:w-1/2 text-center md:text-right">
                    <a href="https://github.com/tightenco/onramp" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Source</a>
                </div>
            </div>
        </nav>
        <!-- /nav -->

        <!-- blog -->
        @yield('body')
        <!-- /blog -->

        <!-- footer -->
        <footer class="w-full bg-white px-6 border-t">
            <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
                <p>From the lovely folks at <a href="https://tighten.co/">Tighten.</a></p>
                <div class="pt-4 md:p-0 text-center md:text-right text-xs">
                    <a href="https://github.com/tightenco/onramp" class="text-black no-underline hover:underline">Source</a>
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
