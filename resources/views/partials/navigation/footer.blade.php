<footer class="w-full px-4 py-10 text-white bg-blue-black">
    <div class="flex flex-col items-center">
        <p class="w-full mb-4 text-lg text-center sm:w-auto sm:mb-0 md:text-body">
            {{ __('From the lovely folks at') }}

            <a class="font-semibold" href="https://tighten.com/">
                <span class="underline">Tighten</span>
            </a>
        </p>

        <div class="text-base text-mint">
            <a class="mr-3 underline" href="{{ route_wlocale('use-of-data') }}">{{ __('Use of Data') }}</a>

            <a href="https://github.com/tighten/onramp" class="underline" target="_blank">
                {{ __('Source & Roadmap') }}
            </a>
        </div>
    </div>

    <x-button.primary
        id="top-button"
        href="#top"
        class="fixed invisible uppercase rounded-full bottom-10 right-48"
    >
        <span class="block font-semibold text-center transform -rotate-90">&gt;</span>
        <span class="block font-semibold text-center">{{ __('Top') }}</span>
    </x-button.primary>
</footer>
