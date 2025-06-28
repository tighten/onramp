<!--suppress ALL -->
<div class="grid grid-cols-1 py-8 ml-4 overflow-hidden lg:mt-20 md:grid-cols-2 bg-blue-black">
    <div class="flex items-center w-full">
        <div class="max-w-2xl">
            <h1 class="font-bold leading-none text-white h4 sm:h3 lg:h2">
                {{ __('Providing an easy entrance into Laravel for new developers.') }}
            </h1>

            <a class="relative inline-block w-auto px-4 py-2 mt-8 mb-12 text-lg font-semibold text-center transition duration-200 ease-in-out border-2 text-blue-black under rounded-3xl border-mint bg-mint hover:no-underline hover:bg-transparent hover:text-mint"
               href="#overview" style="scroll-margin-top: 50px">
                <span>{{ __('Learn more') }}</span>
            </a>
        </div>

    </div>
    <div class="relative -ml-12">
        @include('partials.svg.logo-gradient')
    </div>
</div>
