@extends('layouts.app')

@section('content')
@php
$locale = new App\Localization\Locale;
$localePreferenceKey = 'locale';
@endphp
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container">
            <h1 class="max-w-lg">{{ __('Getting Started') }}</h1>
        </div>
    </div>

    <div class="pb-48 fluid-container lg:pt-8">
        <form action="{{ route_wlocale('wizard.store') }}" method="POST">
            @csrf

            <div>
                <div class="pb-5 mt-12 border-b border-gray-300">
                    <h2 class="text-xl font-medium md:text-2xl lg:text-3xl">{{ __('A bit about yourself') }}</h2>
                </div>

                <div class="mt-5">
                    <p class="text-sm leading-5 text-gray-600 md:text-base">
                        {{ __('Help us get to know your environment and knowledge, so we can show you the right information.') }}
                    </p>

                    <div class="flex flex-wrap px-5 pb-2 mt-6 border border-gray-300 lg:flex-no-wrap md:px-8">
                        <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                            <label
                                for="{{ $localePreferenceKey }}"
                                id="locale-label"
                                class="text-base font-medium text-gray-900"
                            >
                                {{ __('Preferred Language') }}
                            </label>

                            <div class="relative max-w-xs mt-4">
                                <select
                                    class="block w-full px-4 py-2 pr-8 text-sm leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}"
                                    name="{{ $localePreferenceKey }}"
                                    aria-labelledby="locale-label"
                                >
                                    @foreach ($locale->slugs() as $slug)
                                        <option value="{{ $slug }}" {{ (locale() == $slug || old($localePreferenceKey) == $slug) ? 'selected' : '' }}>{{ $locale->languageForLocale($slug) }}</option>
                                    @endforeach
                                </select>

                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>

                            @error($localePreferenceKey)
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first($localePreferenceKey) }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                            <label
                                for="os"
                                id="os-label"
                                class="text-base font-medium text-gray-900"
                            >
                                {{ __('Preferred Operating System') }}
                            </label>

                            <div class="relative max-w-xs mt-4">
                                <select
                                    class="block w-full text-sm px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline{{ $errors->has('os') ? ' border-red-500' : '' }}"
                                    name="os"
                                    aria-labelledby="os-label"
                                >
                                    @foreach (App\OperatingSystem::ALL as $key)
                                        <option value="{{ $key }}" {{ (Preferences::get('operating-system') == $key || old('os') == $key) ? 'selected' : '' }}>@lang('operatingsystems.' . $key)</option>
                                    @endforeach
                                </select>

                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>

                            @error('os')
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first('os') }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                            <label
                                for="track"
                                id="track-label"
                                class="text-base font-medium text-gray-900"
                            >
                                {{ __('Background Experience') }}
                            </label>

                            <div class="relative max-w-xs mt-4">
                                <select
                                    class="block w-full px-4 py-2 text-sm pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline{{ $errors->has('track') ? ' border-red-500' : '' }}"
                                    name="track"
                                    aria-labelledby="track-label"
                                >
                                    @foreach (App\Track::all() as $track)
                                        <option value="{{ $track->id }}" {{ (old('track') == $track->id) ? 'selected' : '' }}>{{ $track->name }}</option>
                                    @endforeach
                                </select>

                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>

                            @error('track')
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first('track') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5 mt-8">
                <div class="flex justify-start">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit" class="py-2 lg:text-lg button button-purple">
                            {{ ucfirst(__('complete')) }}
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
