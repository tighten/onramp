<div class="mt-5">
    @isset($description)
        <p class="text-sm leading-5 text-gray-700 md:text-base">
            {{ $description }}
        </p>
    @endisset

    <div class="flex flex-wrap px-5 pb-2 mt-6 border border-gray-300 lg:flex-no-wrap md:px-8">
        {{ $slot }}
    </div>
</div>
