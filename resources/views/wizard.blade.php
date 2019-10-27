@extends('layouts.app')

@section('content')
@php
$locale = new App\Localization\Locale();
@endphp
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class="text-xl md:text-4xl pb-4">{{ __('A bit about yourself') }}</h1>
        <p class="leading-loose text-gray-dark">
            {{ __('Help us get to know your environment and knowledge, so we can show you the right information.') }}
        </p>
    </div>
    <!-- /title -->

    {{-- Content for this page will eventually likely be in a DB. Right now, check out learn.php. --}}

    <div class="container mx-auto mb-8 mt-8">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-lg">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                    <form class="w-full p-6"  action="{{ route_wlocale('wizard.write') }}" method="POST">
                        @csrf
                        <div class="flex flex-wrap mb-6">
                            <label id="os-label" for="os">
                                @lang('Preferred Operating System'):
                            </label>
                            <select 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}" 
                                name="os"
                                aria-labelledby="os-label">
                                <option value="any" @if(auth()->user()->os == 'any' || old('os') == 'any') selected @endif>@lang('Any')</option>
                                <option value="osx" @if(auth()->user()->os == 'osx' || old('os') == 'osx') selected @endif>@lang('Mac OSX')</option>
                                <option value="linux" @if(auth()->user()->os == 'linux' || old('os') == 'linux') selected @endif>@lang('Linux')</option>
                                <option value="windows" @if(auth()->user()->os == 'windows' || old('os') == 'windows') selected @endif>@lang('Windows')</option>
                            </select>
                            @if ($errors->has('os'))
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $errors->first('os') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="track" id="track-label">
                                @lang('Background experience'):
                            </label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}"
                                name="track"
                                aria-labelledby="track-label">
                                @foreach (App\Track::all() as $track)
                                    <option value="{{ $track->id }}" @if(old('track') == $track->id) selected @endif>{{ $track->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('track'))
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $errors->first('track') }}
                                </p>
                            @endif
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
                                    <option value="{{ $slug }}" @if(locale() == $slug || old('locale') == $slug) selected @endif>{{ $locale->languageForLocale($slug) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('locale'))
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $errors->first('locale') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Complete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
