@extends('layouts.app')

@php
$localePreferenceKey = 'locale';
$resourceLanguagePreferenceKey = 'resource-language';
@endphp

@section('content')
    <div class="w-full">
        <x-hero>
            <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('Preferences') }}</h1>
        </x-hero>

        <x-panel>
            <form method="post"
                action="{{ route_wlocale('user.preferences.update') }}">
                @method('PATCH')
                @csrf

                <div>
                    <div class="pb-5 mt-12">
                        <h2 class="text-xl font-medium md:text-2xl lg:text-3xl">{{ __('Account Preferences') }}</h2>
                    </div>

                    <div class="mt-5">
                        <label for="{{ $localePreferenceKey }}"
                            id="locale-label"
                            class="block text-sm leading-5 text-steel md:text-base">
                            {{ __('Which resources should we show for you?') }}
                        </label>

                        <div class="p-5 mt-6 border rounded-md border-silver md:p-8">
                            @foreach ($resourceLanguagePreferences as $index => $label)
                                <div class="flex items-center mt-4 first:mt-0">
                                    <input id="lang_pref_{{ $index }}"
                                        name="{{ $resourceLanguagePreferenceKey }}"
                                        value="{{ $index }}"
                                        type="radio"
                                        {{ $currentResourceLanguagePreference == $index ? 'checked' : '' }}
                                        class="flex-none w-4 h-4 transition duration-200 ease-in-out text-purple" />

                                    <label for="lang_pref_{{ $index }}"
                                        class="ml-3">
                                        <span
                                            class="block text-sm font-medium leading-5 text-steel md:text-base">{{ $label }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pb-5 mt-12">
                        <h2 class="text-xl font-medium md:text-2xl lg:text-3xl">{{ __('System Preferences') }}</h2>
                    </div>

                    <div class="mt-5">
                        <p class="text-sm leading-5 text-steel md:text-base">
                            {{ __('Filter resources based on your operating system and language preference.') }}
                        </p>

                        <div class="flex flex-wrap px-5 pb-2 mt-6 border rounded-md border-silver lg:flex-no-wrap md:px-8">
                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label for="{{ $localePreferenceKey }}"
                                    id="locale-label"
                                    class="text-base font-medium text-steel">
                                    {{ __('Preferred Language') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select
                                        class="block w-full px-4 py-2 pr-8 text-sm leading-tight bg-white border rounded-md border-gray shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-cabernet' : '' }}"
                                        name="{{ $localePreferenceKey }}"
                                        aria-labelledby="locale-label">
                                        @foreach (Facades\App\Localization\Locale::slugs() as $slug)
                                            <option value="{{ $slug }}"
                                                @if (old($localePreferenceKey) == $slug || $preferredLocale == $slug) selected @endif>
                                                {{ Facades\App\Localization\Locale::languageForLocale($slug) }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                @error($localePreferenceKey))
                                    <p class="mt-2 text-xs italic text-cabernet">
                                        {{ $errors->first($localePreferenceKey) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label for="operating-system"
                                    id="os-label"
                                    class="text-base font-medium text-steel">
                                    {{ __('Preferred Operating System') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select
                                        class="block w-full text-sm px-4 py-2 pr-8 leading-tight bg-white border rounded-md border-gray shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has('operating-system') ? ' border-cabernet' : '' }}"
                                        name="operating-system"
                                        aria-labelledby="os-label">
                                        @foreach (App\OperatingSystem::ALL as $key)
                                            <option value="{{ $key }}"
                                                {{ Preferences::get('operating-system') == $key || old('operating-system') == $key ? 'selected' : '' }}>
                                                @lang('operatingsystems.' . $key)</option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('operating-system')
                                    <p class="mt-2 text-xs italic text-cabernet">
                                        {{ $errors->first('operating-system') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="pb-5 mt-12">
                        <h2 class="text-xl font-medium md:text-2xl lg:text-3xl">{{ __('Background Experience') }}</h2>
                    </div>

                    <div class="mt-5">
                        <p class="text-sm leading-5 text-silver md:text-base">
                            {{ __('Track your progress in modules based on your current background experience.') }}
                        </p>

                        <div class="flex flex-wrap px-5 pb-2 lg:flex-no-wrap md:px-8">
                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label for="track"
                                    id="track-label"
                                    class="text-base font-medium text-steel">
                                    {{ __('Current Track') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select
                                        class="block w-full px-4 py-2 text-sm pr-8 leading-tight bg-white border rounded-md border-gray shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has('track') ? ' border-cabernet' : '' }}"
                                        name="track"
                                        aria-labelledby="track-label">
                                        @foreach (App\Models\Track::all() as $track)
                                            <option value="{{ $track->id }}"
                                                {{ auth()->user()->track_id == $track->id || old('track') == $track->id ? 'selected' : '' }}>
                                                {{ $track->name }}</option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('track')
                                    <p class="mt-2 text-xs italic text-cabernet">
                                        {{ $errors->first('track') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5 mt-8">
                    <div class="flex justify-start">
                        <span class="inline-flex">
                            <x-button.primary type="submit">
                                {{ ucfirst(__('save')) }}
                            </x-button.primary>
                        </span>
                    </div>
                </div>
            </form>
        </x-panel>
    </div>
@endsection
