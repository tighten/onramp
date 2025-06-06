@extends('layouts.app')

@section('content')
    @php
        $locale = new App\Localization\Locale();
        $localePreferenceKey = 'locale';
    @endphp
    <div class="w-full">
        <x-hero>
            <div class="flex flex-col items-center justify-center order-first px-4 md:order-none max-w-96">
                <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('Getting Started') }}</h1>
            </div>
        </x-hero>

        <div class="pb-48 -mt-px bg-white container lg:pt-8">
            <form action="{{ route_wlocale('wizard.store') }}"
                method="POST">
                @csrf

                <div>
                    <div class="py-6 ">
                        <h2 class="text-xl font-medium md:text-2xl lg:text-3xl">{{ __('A bit about yourself') }}</h2>
                    </div>

                    <div class="mt-5">
                        <p class="text-sm leading-5 text-steel md:text-base">
                            {{ __('Help us get to know your environment and knowledge, so we can show you the right information.') }}
                        </p>

                        <div class="flex flex-wrap px-5 pb-2 mt-6 border rounded-md border-silver lg:flex-no-wrap md:px-8">
                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label class="text-base font-medium text-steel"
                                    for="{{ $localePreferenceKey }}"
                                    id="locale-label">
                                    {{ __('Preferred Language') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select aria-labelledby="locale-label"
                                        class="cursor-pointer block w-full px-4 py-2 pr-8 text-sm leading-tight bg-white border border-gray rounded-md shadow appearance-none hover:border-silver focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-cabernet' : '' }}"
                                        name="{{ $localePreferenceKey }}">
                                        @foreach ($locale->slugs() as $slug)
                                            <option
                                                {{ locale() == $slug || old($localePreferenceKey) == $slug ? 'selected' : '' }}
                                                value="{{ $slug }}">
                                                {{ $locale->languageForLocale($slug) }}</option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                @error($localePreferenceKey)
                                    <p class="mt-2 text-xs italic text-cabernet">
                                        {{ $errors->first($localePreferenceKey) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label class="text-base font-medium text-steel"
                                    for="os"
                                    id="os-label">
                                    {{ __('Preferred Operating System') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select aria-labelledby="os-label"
                                        class="block w-full text-sm px-4 py-2 pr-8 leading-tight bg-white border border-gray rounded shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has('os') ? ' border-cabernet' : '' }}"
                                        name="os">
                                        @foreach (App\OperatingSystem::ALL as $key)
                                            <option
                                                {{ Preferences::get('operating-system') == $key || old('os') == $key ? 'selected' : '' }}
                                                value="{{ $key }}">
                                                @lang('operatingsystems.' . $key)</option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('os')
                                    <p class="mt-2 text-xs italic text-cabernet">
                                        {{ $errors->first('os') }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex-auto w-full my-5 lg:flex-even md:my-8">
                                <label class="text-base font-medium text-steel"
                                    for="track"
                                    id="track-label">
                                    {{ __('Background Experience') }}
                                </label>

                                <div class="relative max-w-xs mt-4">
                                    <select aria-labelledby="track-label"
                                        class="block w-full px-4 py-2 text-sm pr-8 leading-tight bg-white border border-gray rounded shadow appearance-none hover:border-gray focus:outline-none focus:shadow-outline{{ $errors->has('track') ? ' border-cabernet' : '' }}"
                                        name="track">
                                        @foreach (App\Models\Track::all() as $track)
                                            <option {{ old('track') == $track->id ? 'selected' : '' }}
                                                value="{{ $track->id }}">
                                                {{ $track->name }}</option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-steel">
                                        <svg class="w-4 h-4 fill-current"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
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
                            <button
                                class="p-2 text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple"
                                type="submit">
                                {{ ucfirst(__('complete')) }}
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
