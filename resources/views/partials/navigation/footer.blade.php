<footer class="w-full px-4 py-10 text-white bg-blue-black">
    <div class="flex items-center justify-center mx-auto text-center">
        <div>
            <p class="w-full mb-4 sm:w-auto sm:mb-0 text-body">{{ __('From the lovely folks at') }} <a
                    class="font-semibold"
                    href="https://tighten.co/"><span class="underline">Tighten.</span></a></p>

            <div class="text-base text-mint">
                <a class="mr-3 underline"
                    href="{{ route_wlocale('use-of-data') }}">{{ __('Use of Data') }}</a>

                <a href="https://github.com/tighten/onramp"
                    class="underline"
                    target="_blank">{{ __('Source & Roadmap') }}</a>
                {{-- <a href="#" class="ml-4 text-black">Terms &amp; Conditions</a> @screen xx
            <a href="#" class="ml-4 text-black">Contact Us</a> --}}
            </div>
        </div>
    </div>
</footer>
