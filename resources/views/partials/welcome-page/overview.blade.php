<div class="grid grid-cols-1 py-8 overflow-hidden lg:mt-16 md:grid-cols-2" id="overview">
    <div class="flex items-center w-full mb-8 md:mb-0">
        <div class="max-w-lg px-4 xl:px-0">
            <h2 class="font-bold leading-none h4 sm:h3 lg:h2">{{ __('What is this?') }}</h2>

            <p class="mt-8 text-xl leading-normal md:text-2xl lg:text-3xl lg:mt-10">
                {{ __('Onramp gathers educational resources, organized for you to become a Laravel programmer as easily and effectively as possible.') }}
            </p>
        </div>
    </div>
    <div class="relative md:order-first">
        @include('partials.svg.path')
    </div>
</div>
