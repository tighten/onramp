@props([
    'type' => 'submit',
])

<span class="inline-flex rounded-md shadow-sm">
    <button
        type="{{ $type }}"
        class="px-4 py-2 text-sm font-medium text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md  focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple"
    >
        {{ $slot }}
    </button>
</span>
