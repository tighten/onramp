@props([
    'name',
    'label',
    'value' => null,
    'type' => 'text',
])

<div class="flex-auto w-full my-5 lg:flex-even md:my-8">
    <label
        for="{{ $name }}"
        id="{{ $name }}-label"
        class="text-base font-medium text-gray-900"
    >
        {{ $label }}
    </label>

    <div class="relative max-w-xs mt-4">
        <input
            type="{{ $type }}"
            class="block w-full px-4 py-2 text-sm pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline{{ $errors->has($name) ? ' border-red-500' : '' }}"
            name="{{ $name }}"
            aria-labelledby="{{ $name }}-label"
            value="{{ old($name, $value) }}"
        >
    </div>

    @error($name)
        <p class="mt-2 text-xs italic text-red-500">
            {{ $errors->first($name) }}
        </p>
    @enderror
</div>
