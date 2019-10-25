@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">My preferences</h1>
        {{--
        <p class="leading-loose text-gray-dark">
            @todo
        </p>
        --}}
    </div>
    <!-- /title -->

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full md:pr-12 mb-6">
            <h2 class="mb-6 mt-8 text-black text-xl md:text-2xl">
                {{ __('Language preference') }}
            </h2>

            <form method="post" action="{{ route_wlocale('user.preferences.store') }}">
                @csrf
                @foreach ($resourceLanguagePreferences as $index => $label)
                    <input
                        id="lang_pref_{{ $index }}"
                        name="language_preference"
                        type="radio"
                        value="{{ $index }}"
                        {{ $currentResourceLanguagePreference == $index ? 'checked' : '' }}
                    />
                    <label for="lang_pref_{{ $index }}">{{ $label }}</label>
                    <br />
                @endforeach
                <p>
                    <button class="button block">{{ __('save') }}</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
