@props(['flex' => null, 'fluid' => null])

<div class="w-full mx-auto">
    <div {{ $attributes }} class="py-8 -mt-px bg-white rounded-b-lg panel mx-auto {{ $fluid ? 'fluid-container' : 'container' }} {{ $flex ? 'md:flex items-start' : '' }} max-w-screen-2xl">
        {{ $slot }}
    </div>
</div>
