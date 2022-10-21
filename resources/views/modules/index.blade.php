@extends('layouts.app')

@section('content')
<div class="w-full bg-off-white">
    @include('partials.you-should-log-in')

    <x-hero id="top">
        <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('Modules') }}</h1>
		<p class="max-w-96">{{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}</p>

        @if (auth()->check() && auth()->user()->hasTrack())
            <div class="mt-6 text-sm text-comet">{!! __('You are on the :track track.', ['track' => '<span class="font-semibold">'.auth()->user()->track->name.'</span>']) !!}
                <a class="ml-2 mr-4 font-semibold text-teal" href="{{ url_wlocale('preferences') }}">{{ __('Change settings') }}</a>
            </div>
            @endif
    </x-hero>


    <x-panel>
        <module-listing
            :standard-modules="{{ $standardModules }}"
            :bonus-modules="{{ $bonusModules }}"
            :user-modules="{{ $userModules }}"
            :completed-modules="{{ $completedModules }}"
            :user-resource-completions="{{ $userResourceCompletions }}"
            :user-logged-in="{{ auth()->check() ? 'true' : 'false' }}"
        ></module-listing>
    </x-panel>
</div>
@endsection
