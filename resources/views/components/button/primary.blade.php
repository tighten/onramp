@props([
    'type' => 'submit',
])

<span class="inline-flex rounded-md shadow-sm">
    <button
        type="{{ $type }}"
        class="py-2 lg:text-lg button button-purple"
    >
        {{ $slot }}
    </button>
</span>
