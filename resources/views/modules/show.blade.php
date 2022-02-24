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
                        <p class="mb-3 text-xl font-semibold md:mb-8 md:text-2xl lg:text-4xl">{{ __('Overview') }}</p>

                        <p class="max-w-lg md:mb-10 xl:leading-normal">
                            {{ $module->description }}
                        </p>
                    </div>
                @endif

                <div>
                    <p class="mb-3 text-xl font-semibold md:mb-8 md:text-2xl lg:text-4xl">{{ __('Skills') }}</p>
                    <ul class="flex flex-wrap -m-1 md:-m-2">
                        @forelse ($skills as $skill)
                            @auth
                                @if (Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id))
                                    <li class="block m-1 md:m-2">
                                        <completed-badge badge-text="{{ $skill->name }}"
                                            :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                            type="{{ $skill->getMorphClass() }}"
                                            id="{{ $skill->id }}"></completed-badge>
                                    </li>
                                @else
                                    <li class="relative block px-4 py-2 m-1 bg-opacity-25 rounded-md mg-mint">
                                        <span class="font-bold text-teal">{{ $skill->name }}</span>
                                    </li>
                                @endif
                            @endauth
                            @guest
                                <li class="relative block px-4 py-2 m-1 bg-opacity-25 rounded-md mg-mint">
                                    <span class="font-bold text-teal">{{ $skill->name }}</span>
                                </li>
                            @endguest
                        @empty
                            <li class="relative block m-1">{{ __('No skills') }}</li>
                        @endforelse

                        @if ($bonusSkills->isNotEmpty())
                            <li class="mt-4 font-bold list-none">BONUS:</li>
                            @foreach ($bonusSkills as $skill)
                                @if (Auth::check())
                                    <li class="block m-1 md:m-2">
                                        <completed-badge badge-text="{{ $skill->name }}"
                                            :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                            type="{{ $skill->getMorphClass() }}"
                                            id="{{ $skill->id }}"></completed-badge>
                                    </li>
                                @else
                                    <li class="relative block px-4 py-2 m-1">
                                        <span
                                            class="absolute inset-0 w-full h-full bg-teal-400 rounded-md opacity-10"></span>
                                        <span class="font-bold text-teal">{{ $skill->name }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <tabs>
            <tab @if ($resourceType === 'free-resources') :selected="true" @endif
                name="{{ __('Free resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
            </tab>

            <tab @if ($resourceType === 'paid-resources') :selected="true" @endif
                name="{{ __('Paid resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'paid-resources']) }}">
            </tab>

            {{-- @todo Show this once we add in quizzes and exercises --}}
            {{-- <tab
            @if ($resourceType === 'quizzes') :selected="true" @endif
            name="Quizzes"
            url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'quizzes']) }}">
        </tab>

        <tab
            @if ($resourceType === 'exercises') :selected="true" @endif
            name="Exercises"
            url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'exercises']) }}">
        </tab> --}}
        </tabs>

        <x-panel>
            <resource-language-preference-switcher class="md:-mt-5 lg:-mt-8 xl:-mt-6"
                language="{{ Localization::languageForLocale(locale()) }}"
                initial-choice="{{ $currentResourceLanguagePreference }}">
            </resource-language-preference-switcher>

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
    </div>
@endsection
