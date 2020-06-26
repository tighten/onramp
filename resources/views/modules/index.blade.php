@extends('layouts.app')

@section('content')
<div class="w-full bg-off-white">
    @include('partials.you-should-log-in')

    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="relative fluid-container">
            <h1 class="max-w-lg">{{ __('Modules') }}</h1>

            <p class="max-w-md mt-4 leading-normal text-comet lg:mt-5">
                {{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}
            </p>

            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/double-curve-dark-large.svg">

                <img
                    class="absolute right-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px opacity-10 top-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg"
                    alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="pb-48">
        <module-listing
            :standard-modules="{{ $standardModules }}"
            :bonus-modules="{{ $bonusModules }}"
            :user-modules="{{ $userModules }}"
            :completed-modules="{{ $completedModules }}"
            :user-resource-completions="{{ $userResourceCompletions }}"
            :user-logged-in="{{ auth()->check() ? 'true' : 'false' }}"
        ></module-listing>
    </div>
</div>
@endsection
