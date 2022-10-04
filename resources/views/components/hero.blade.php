<section class="grid w-full grid-cols-1 pt-12 pb-8 overflow-x-hidden text-center text-white md:px-0 md:pb-0 sm:overflow-visible md:grid-cols-4 bg-blue-black" {{ $attributes }}>
    <div class="mx-auto md:ml-0 md:place-self-start">
        @include('partials.svg.path-sm')
    </div>

    <div class="relative z-10 flex flex-col items-center justify-center order-first col-span-2 px-4 md:order-none">
        {{ $slot }}
    </div>

    <div class="hidden origin-center rotate-180 md:block">
        @include('partials.svg.path-sm')
    </div>
</section>
