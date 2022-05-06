@props([
    'href',
    'type' => 'submit',
])

@php
    $element = isset($href) ? 'a' : 'button';
@endphp

<span class="inline-flex rounded-md shadow-sm">
    <{{ $element }}
        @isset($href) href="{{ $href }}" @else type="{{ $type }}" @endisset
        {{ $attributes->merge(['class' => 'px-4 py-2 text-sm font-medium text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md'])}}
    >
        {{ $slot }}
    </{{ $element }}>
</span>