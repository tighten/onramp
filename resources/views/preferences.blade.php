@extends('layouts.app')

@php
$localePreferenceKey = 'locale';
$resourceLanguagePreferenceKey = 'resource-language';
@endphp

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">{{ __('My preferences') }}</h1>
    </div>

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full md:pr-12 mb-6">
            <h2 class="mb-6 mt-8 text-black text-xl md:text-2xl">
                {{ __('Account Preferences') }}
            </h2>

            <form method="post" action="{{ route_wlocale('user.preferences.store') }}">
                @csrf
                <div class="mb-6">
                    <label for="{{ $localePreferenceKey }}" id="locale-label">
                        {{ __('Which resources should we show for you?') }}
                    </label>
                    <div>
                    @foreach ($resourceLanguagePreferences as $index => $label)
                        <input
                            id="lang_pref_{{ $index }}"
                            name="{{ $resourceLanguagePreferenceKey }}"
                            type="radio"
                            value="{{ $index }}"
                            {{ $currentResourceLanguagePreference == $index ? 'checked' : '' }}
                        />
                        <label for="lang_pref_{{ $index }}">{{ $label }}</label>
                        <br />
                    @endforeach
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="{{ $localePreferenceKey }}" id="locale-label">
                        {{ __('Preferred Language') }}
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}"
                        name="{{ $localePreferenceKey }}"
                        aria-labelledby="locale-label">

                        @foreach (Facades\App\Localization\Locale::slugs() as $slug)
                            <option value="{{ $slug }}"
                                @if (old($localePreferenceKey) == $slug || $preferredLocale == $slug) selected @endif
                                >{{ Facades\App\Localization\Locale::languageForLocale($slug) }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has($localePreferenceKey))
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $errors->first($localePreferenceKey) }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label id="os-label" for="operating-system">
                        {{ __('Preferred Operating System') }}
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('operating-system') ? ' border-red-500' : '' }}"
                        name="operating-system"
                        aria-labelledby="os-label">
                        @foreach (App\OperatingSystem::ALL as $key)
                            <option value="{{ $key }}" {{ (Preferences::get('operating-system') == $key || old('operating-system') == $key) ? 'selected' : '' }}>@lang('operatingsystems.' . $key)</option>
                        @endforeach
                    </select>
                    @if ($errors->has('operating-system'))
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $errors->first('operating-system') }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label id="track-label" for="track">
                        {{ __('Current Track') }}
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('track') ? ' border-red-500' : '' }}"
                        name="track"
                        aria-labelledby="track-label">
                        @foreach (App\Track::all() as $track)
                            <option value="{{ $track->id }}" {{ (Preferences::get('track') == $track->id || old('track') == $track->id) ? 'selected' : '' }}>{{ $track->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('track'))
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $errors->first('track') }}
                        </p>
                    @endif
                </div>

                <button class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">{{ ucfirst(__('save')) }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
