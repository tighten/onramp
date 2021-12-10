<div class="grid grid-cols-1 px-4 py-12 place-content-center bg-blue-black md:grid-cols-2 md:py-20">
    <div class="flex items-center justify-center w-full lg:justify-end">
        <div>
            <h1 class="max-w-lg font-bold leading-none text-white h4 sm:h2">
                {{ __('Providing an easy entrance into Laravel for new developers.') }}
            </h1>

            <a class="inline-block w-auto px-4 py-2 mt-8 mb-12 text-lg font-semibold text-center transition duration-150 ease-in-out border-2 text-blue-black under rounded-3xl border-mint bg-mint hover:no-underline hover:bg-transparent hover:text-mint"
                href="#overview">
                <span>{{ __('Learn more') }}</span>
            </a>
        </div>
    </div>
    <div class="mt-12">
        @include('partials.svg.logo-gradient')
    </div>
</div>
