<div class="flex items-center justify-center px-4 py-12 mt-12 md:py-20"  id="overview">
    <div>
        @include('partials.svg.logo-gradient')
    </div>
    <div class="flex items-center justify-center text-white">
        <div class="max-w-lg">
            <h2 class="font-bold leading-none h4 sm:h2">{{ __('What is this?') }}</h2>

            <p class="mt-8 leading-normal lg:text-xl lg:mt-10">
                {{ __('Onramp gathers educational resources, organized for you to become a Laravel programmer as easily and effectively as possible.') }}
            </p>
        </div>
    </div>
</div>
@include('partials.welcome-page.demographic')
