@extends('layouts.app')

@php
use App\Resource;
@endphp

@section('content')
<div class="pb-48 w-full bg-off-white lg:pb-32">
    @include('partials.you-should-log-in')

    <div class="bg-teal-600 pb-24 pt-16 md:pb-40 lg:pt-24 lg:pb-48">
        <div class="fluid-container relative lg:flex lg:items-center lg:justify-between">
            <h1 class="text-white">{{ $module->name }}</h1>

            @auth
                <completed-button
                    :initial-is-completed="{{ $completedModules->contains($module->id) ? 'true' : 'false' }}"
                    type="{{ $module->getMorphClass() }}"
                    id="{{ $module->id }}">
                </completed-button>
            @endauth
        </div>
    </div>

    <div class="fluid-container pb-16">
        <div class="bg-white -mt-16 pt-6 px-4 pb-8 shadow-md md:p-10 md:pb-16 md:-mt-32 lg:px-16 lg:pb-20 lg:pt-16">
            @if ($module->description)
                <div>
                    <p class="mb-3 font-semibold text-xl md:mb-8 md:text-2xl lg:text-4xl">Overview</p>

                    <p class="text-east-bay pr-2 mb-6 md:mb-10 lg:max-w-3xl xl:leading-loose">
                        {{ $module->description }}
                    </p>
                </div>
            @endif

            <div>
                <p class="mb-3 font-semibold text-xl md:mb-8 md:text-2xl lg:text-4xl">Skills</p>
                <ul class="flex flex-wrap -m-1 md:-m-2">
                    @forelse ($skills as $skill)
                        @if (Auth::check())
                            <li class="block m-1 md:m-2">
                                <completed-badge
                                    badge-text="{{ $skill->name }}"
                                    :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                    type="{{ $skill->getMorphClass() }}"
                                    id="{{ $skill->id }}"
                                ></completed-badge>
                            </li>
                        @else
                            <li class="relative block py-2 px-4 m-1">
                                <span class="absolute inset-0 bg-teal-400 opacity-10 w-full h-full rounded-md"></span>
                                <span class="font-bold text-teal-600">{{ $skill->name }}</span>
                            </li>
                        @endif
                    @empty
                        <li class="relative block m-1">No skills</li>
                    @endforelse

                    @if ($bonusSkills->isNotEmpty())
                        <li class="font-bold mt-4 list-none">BONUS:</li>
                        @foreach ($bonusSkills as $skill)
                            @if (Auth::check())
                                <li class="block m-1 md:m-2">
                                    <completed-badge
                                        badge-text="{{ $skill->name }}"
                                        :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                        type="{{ $skill->getMorphClass() }}"
                                        id="{{ $skill->id }}"
                                    ></completed-badge>
                                </li>
                            @else
                                <li class="relative block py-2 px-4 m-1">
                                    <span class="absolute inset-0 bg-teal-400 opacity-10 w-full h-full rounded-md"></span>
                                    <span class="font-bold text-teal-600">{{ $skill->name }}</span>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <tabs>
        <tab
            @if ($resourceType === 'free-resources') :selected="true" @endif
            name="Free resources"
            url="{{route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources'])}}">
        </tab>

        <tab
            @if ($resourceType === 'paid-resources') :selected="true" @endif
            name="Paid resources"
            url="{{route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'paid-resources'])}}">
        </tab>

        <tab
            @if ($resourceType === 'quizzes') :selected="true" @endif
            name="Quizzes"
            url="{{route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'quizzes'])}}">
        </tab>

        <tab
            @if ($resourceType === 'exercises') :selected="true" @endif
            name="Exercises"
            url="{{route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'exercises'])}}">
        </tab>
    </tabs>

    <div class="fluid-container">

        <resource-language-preference-switcher
            language="{{ Localization::languageForLocale(locale()) }}"
            initial-choice="{{ $currentResourceLanguagePreference }}"
        >
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
    </div>
</div>
@endsection
