@props([
    'href' => null,
])

<x-button.base
    :href="$href"
    {{ $attributes->merge([
        'class' => 'focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple'
    ]) }}
>
    {{ $slot }}
</x-button.base>
