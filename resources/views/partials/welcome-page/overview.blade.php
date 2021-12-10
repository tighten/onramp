<div class="grid grid-cols-1 py-12 mt-12 md:grid-cols-2 md:py-20" id="overview">
    <div>
        @include('partials.svg.path')
    </div>
    <div class="flex items-center w-full max-w-lg text-white lg:justify-start">
        <div>
            <h2 class="font-bold leading-none h4 sm:h2">{{ __('What is this?') }}</h2>

            <p class="mt-8 text-xl leading-normal lg:text-3xl lg:mt-10">
                {{ __('Onramp gathers educational resources, organized for you to become a Laravel programmer as easily and effectively as possible.') }}
            </p>
        </div>
    </div>
</div>
@include('partials.welcome-page.demographic')
