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
                @foreach($languagePreferences as $index => $label)
                    <input name="lang_pref" type="radio" value="{{ $index }}" {{
                    $currentLanguagePreference == $index ? 'checked' : ''}}/>
                    <label for="lang_pref">{{ $label }}</label>
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
