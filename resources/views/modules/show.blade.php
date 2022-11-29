@extends('layouts.app')

@php
$level = !$module->is_bonus ? $module->skill_level : 'bonus';

switch ($level) {
    case 'intermediate':
        $bgColor = 'bg-sea';
        break;
    case 'advanced':
        $bgColor = 'bg-merlot';
        break;
    case 'bonus':
        $bgColor = 'bg-steel';
        break;
    default:
        $bgColor = 'bg-emerald';
        break;
}
@endphp

@section('content')
    <div class="w-full pb-48 bg-off-white lg:pb-32">
        @include('partials.you-should-log-in')

        <div class="{{ $bgColor }} pb-24 pt-16 md:pb-40 lg:pt-24 lg:pb-48">
            <div class="relative fluid-container lg:flex lg:items-center lg:justify-between">
                <h1 class="max-w-3xl font-bold text-white h2 lg:h1">{{ $module->name }}</h1>

                @auth
                    @if (Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id))
                        <completed-button
                            :initial-is-completed="{{ $completedModules->contains($module->id) ? 'true' : 'false' }}"
                            type="{{ $module->getMorphClass() }}"
                            id="{{ $module->id }}">
                        </completed-button>
                    @endif
                @endauth
            </div>
        </div>

        <div class="pb-16 fluid-container">
            <div class="grid gap-6 px-4 pt-6 pb-8 -mt-16 bg-white shadow-md sm:grid-cols-2 md:p-10 md:pb-16 md:-mt-32">
                @if ($module->description)
                    <div>
                        <p class="mb-3 text-xl font-semibold md:mb-7 md:text-2xl lg:text-3xl">{{ __('Overview') }}</p>

                        <p class="max-w-lg text-gray-600 md:mb-10 xl:text-xl xl:leading-10">
                            {{ $module->description }}
                        </p>
                    </div>
                @endif

                <div x-data="{ showMore: false }">
                    <p class="mb-3 text-xl font-semibold md:mb-7 md:text-2xl lg:text-3xl">{{ __('Skills') }}</p>
                    <ul class="flex flex-wrap -m-1 md:-m-2">
                        @forelse ($skills as $skill)
                            @if ($loop->index < 4)
                                <skill
                                    @if (Auth::check() && Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id)) :completable="true" @else :completable="false" @endif
                                    :init-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                    id="{{ $skill->id }}"
                                    text="{{ $skill->name }}"
                                    type="{{ $skill->getMorphClass() }}"
                                ></skill>
                            @else
                                <skill x-show="showMore"
                                   @if (Auth::check() && Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id)) :completable="true" @else :completable="false" @endif
                                   :init-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                   id="{{ $skill->id }}"
                                   text="{{ $skill->name }}"
                                   type="{{ $skill->getMorphClass() }}"
                                ></skill>
                            @endif

                            @if ($loop->index == 3 && count($skills) > 4)
                                <button x-on:click="showMore = !showMore;"  x-show="!showMore" class="relative block px-4 py-2 m-1 font-bold leading-5 text-left md:m-2 text-teal sm:leading-6 lg:text-xl lg:leading-8">
                                    <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal"></span>
                                    <span>+ {{ count($skills) - 4  . ' ' . __('more') }}</span>
                                </button>
                            @endif

                            @if ($loop->last && count($skills) > 4)
                                <button x-on:click="showMore = !showMore;"  x-show="showMore" class="relative block px-4 py-2 m-1 font-bold leading-5 text-left md:m-2 text-teal sm:leading-6 lg:text-xl lg:leading-8">
                                    <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal"></span>
                                    <span>- {{ count($skills) - 4  . ' ' . __('more') }}</span>
                                </button>
                            @endif
                        @empty
                            <li class="relative block m-1 md:m-2">
                                <span class="text-gray-600 xl:text-xl xl:leading-10">{{ __('No skills') }}</span>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <tabs dark-mode>
            <tab @if ($resourceType === 'free-resources') :selected="true" @endif
                name="{{ __('Free resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
            </tab>

            <tab @if ($resourceType === 'paid-resources') :selected="true" @endif
                name="{{ __('Paid resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'paid-resources']) }}">
            </tab>

            {{-- @todo Show this once we add in quizzes and exercises --}}
            {{--
                <tab
                    @if ($resourceType === 'quizzes') :selected="true" @endif
                    name="Quizzes"
                    url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'quizzes']) }}">
                </tab>

                <tab
                    @if ($resourceType === 'exercises') :selected="true" @endif
                    name="Exercises"
                    url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'exercises']) }}">
                </tab>
            --}}
        </tabs>

        <resource-language-preference-switcher
            class="px-4 mb-8 sm:px-0"
            language="{{ Localization::languageForLocale(locale()) }}"
            initial-choice="{{ $currentResourceLanguagePreference }}">
        </resource-language-preference-switcher>

        <x-panel>
            <div>
                @php
                    $freeResources = $resources->where('is_free', true);
                    $paidResources = $resources->where('is_free', false);
                @endphp

                @switch($resourceType)
                    @case('free-resources')
                        @include('modules.resources.free')
                    @break

                    @case('paid-resources')
                        @include('modules.resources.paid')
                    @break

                    @case('quizzes')
                        @include('modules.resources.quiz')
                    @break

                    @case('exercises')
                        @include('modules.resources.exercise')
                    @break

                    @default
                        @include('modules.resources.free')
                @endswitch
            </div>
        </x-panel>

        <div class="flex items-start justify-between py-10 sm:pt-16 sm:pb-20">

            <div class="flex justify-start flex-1">
                @if ($previousModule)
                    <div class="flex flex-col items-start text-white group">
                        <x-button.primary
                            href="{{ route_wlocale('modules.show', ['module' => $previousModule->slug, 'resourceType' => 'free-resources']) }}"
                            class="flex tracking-widest uppercase lg:px-10 lg:min-w-[185px] lg:rounded-xl lg:py-3 lg:justify-center"
                        >
                            <span class="inline-block mr-4 font-semibold">&lt;</span>
                            <span class="inline-block font-semibold">Previous</span>
                        </x-button.primary>
                        <span class="mt-5 text-sm leading-tight word-spacing-tight sm:text-base sm:leading-tight lg:text-lg lg:leading-tight">
                            {!! $previousModule->name !!}
                        </span>
                    </div>
                @endif
            </div>

            <div class="flex justify-end flex-1">
                @if ($nextModule)
                    <div class="flex flex-col items-end text-white group">
                        <x-button.primary
                            href="{{ route_wlocale('modules.show', ['module' => $nextModule->slug, 'resourceType' => 'free-resources']) }}"
                            class="flex tracking-widest uppercase lg:px-10 lg:min-w-[185px] lg:rounded-xl lg:py-3 lg:justify-center"
                        >
                            <span class="inline-block font-semibold">Next</span>
                            <span class="inline-block ml-4 font-semibold">&gt;</span>
                        </x-button.primary>
                        <span class="mt-5 text-sm leading-tight text-right word-spacing-tight sm:text-base sm:leading-tight lg:text-lg lg:leading-tight">
                            {!! $nextModule->name !!}
                        </span>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
