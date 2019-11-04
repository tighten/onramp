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
                <div class="mb-6">
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
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="locale" id="locale-label">
                        @lang('Preferred Language'):
                    </label>
                    <select 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}" 
                        name="locale"
                        aria-labelledby="locale-label">
                        @foreach($locale->slugs() as $slug)
                            <option value="{{ $slug }}" @if(locale() == $slug || old('locale') == $slug || $preferredLocale == $slug) selected @endif>{{ $locale->languageForLocale($slug) }}</option>
                        @endforeach
                    </select>
                @if ($errors->has('locale'))
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $errors->first('locale') }}
                        </p>
                    @endif
                </div>
                <button class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">{{ ucfirst(__('save')) }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
