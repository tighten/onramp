@props(['name', 'label', 'value' => null, 'type' => 'text'])

<div class="flex-auto w-full my-5 lg:flex-even md:my-8">
    <label for="{{ $name }}"
        id="{{ $name }}-label"
        class="text-base font-medium text-steel">
        {{ $label }}
    </label>

    <div class="relative max-w-xs mt-4">
        <input type="{{ $type }}"
            class="block w-full px-4 py-2 text-sm pr-8 leading-tight bg-white border border-gray rounded shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has($name) ? ' border-cabernet' : '' }}"
            name="{{ $name }}"
            aria-labelledby="{{ $name }}-label"
            value="{{ old($name, $value) }}">
    </div>

    @error($name)
        <p class="mt-2 text-xs italic text-cabernet">
            {{ $errors->first($name) }}
        </p>
    @enderror
</div>
