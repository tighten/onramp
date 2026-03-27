@extends ('layouts.app')

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

@section ('content')
    <div class="bg-off-white w-full pb-48 lg:pb-32">
        @include ('partials.you-should-log-in')

        <div class="{{ $bgColor }} pb-24 pt-16 md:pb-40 lg:pt-24 lg:pb-48">
            <div class="relative container lg:flex lg:items-center lg:justify-between">
                <h1 class="h2 lg:h1 max-w-3xl font-bold text-white">{{ $module->name }}</h1>

                @auth
                    @if (Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id))
                        <completable-button
                            :initial-is-completed="{{ $completedModules->contains($module->id) ? 'true' : 'false' }}"
                            id="{{ $module->id }}"
                            type="{{ $module->getMorphClass() }}"
                        >
                        </completable-button>
                    @endif
                @endauth
            </div>
        </div>

        <div class="container pb-16">
            <div
                class="-mt-16 grid gap-6 bg-white px-4 pt-6 pb-8 shadow-md sm:grid-cols-2 md:-mt-32 md:p-10 md:pb-16"
            >
                @if ($module->description)
                    <div>
                        <p class="mb-3 text-xl font-semibold md:mb-7 md:text-2xl lg:text-3xl">
                            {{
                                __(
                                    'Overview',
                                )
                            }}
                        </p>

                        <p class="max-w-lg text-gray-600 md:mb-10 xl:text-xl xl:leading-10">
                            {{ $module->description }}
                        </p>
                    </div>
                @endif

                <div x-data="{ showMore: false }">
                    <p class="mb-3 text-xl font-semibold md:mb-7 md:text-2xl lg:text-3xl">{{ __('Skills') }}</p>
                    <ul class="-m-1 flex flex-wrap md:-m-2">
                        @forelse ($skills as $skill)
                            @if ($loop->index < 4)
                                <skill
                                    :init-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                    @if (Auth::check() &&
                                        Auth::user()->hasTrack() &&
                                        Auth::user()->track->modules->contains($module->id))
                                        :completable="true"
                                    @else
                                        :completable="false"
                                    @endif
                                    id="{{ $skill->id }}"
                                    text="{{ $skill->name }}"
                                    type="{{ $skill->getMorphClass() }}"
                                ></skill>
                            @else
                                <skill
                                    :init-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                    @if (Auth::check() &&
                                        Auth::user()->hasTrack() &&
                                        Auth::user()->track->modules->contains($module->id))
                                        :completable="true"
                                    @else
                                        :completable="false"
                                    @endif
                                    id="{{ $skill->id }}"
                                    text="{{ $skill->name }}"
                                    type="{{ $skill->getMorphClass() }}"
                                    x-show="showMore"
                                ></skill>
                            @endif
                            @if ($loop->index == 3 && count($skills) > 4)
                                <button
                                    class="text-emerald relative m-1 block cursor-pointer px-4 py-2 text-left leading-5 font-bold sm:leading-6 md:m-2 lg:leading-8"
                                    x-on:click="showMore = !showMore"
                                    x-show="!showMore"
                                >
                                    <span
                                        class="bg-teal/15 hover:bg-teal/30 absolute inset-0 h-full w-full rounded-md transition-all duration-200 ease-in-out"
                                    ></span>
                                    <span>+ {{ count($skills) - 4 . ' ' . __('more') }}</span>
                                </button>
                            @endif
                            @if ($loop->last && count($skills) > 4)
                                <button
                                    class="text-emerald relative m-1 block cursor-pointer px-4 py-2 text-left leading-5 font-bold sm:leading-6 md:m-2 lg:leading-8"
                                    x-on:click="showMore = !showMore"
                                    x-show="showMore"
                                >
                                    <span
                                        class="bg-teal/15 hover:bg-teal/30 absolute inset-0 h-full w-full rounded-md transition-all duration-200 ease-in-out"
                                    ></span>
                                    <span>- {{ count($skills) - 4 . ' ' . __('more') }}</span>
                                </button>
                            @endif
                        @empty
                            <li class="relative m-1 block md:m-2">
                                <span class="text-gray-600 xl:text-xl xl:leading-10">{{
                                    __(
                                        'No skills',
                                    )
                                }}</span>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <tabs dark-mode>
            <tab
                @if ($resourceType === 'free-resources') :selected="true" @endif
                name="{{ __('Free resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}"
            ></tab>

            <tab
                @if ($resourceType === 'paid-resources') :selected="true" @endif
                name="{{ __('Paid resources') }}"
                url="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'paid-resources']) }}"
            ></tab>

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
            class="mb-8 px-4 sm:px-0"
            initial-choice="{{ $currentResourceLanguagePreference }}"
            language="{{ Localization::languageForLocale(locale()) }}"
        >
        </resource-language-preference-switcher>

        <x-panel>
            <div>
                @php
                    $freeResources = $resources->where('is_free', true);
                    $paidResources = $resources->where('is_free', false);
                @endphp

                @switch ($resourceType)
                    @case ('free-resources')
                        @include ('modules.resources.free')
                        @break
                    @case ('paid-resources')
                        @include ('modules.resources.paid')
                        @break
                    @case ('quizzes')
                        @include ('modules.resources.quiz')
                        @break
                    @case ('exercises')
                        @include ('modules.resources.exercise')
                        @break
                    @default
                        @include ('modules.resources.free')
                @endswitch
            </div>
        </x-panel>

        <div class="flex items-start justify-between py-10 sm:pt-16 sm:pb-20">
            <div class="flex flex-1 justify-start">
                @if ($previousModule)
                    <div class="group flex flex-col items-start text-white">
                        <x-button.primary
                            class="flex tracking-widest uppercase lg:min-w-[185px] lg:justify-center lg:rounded-xl lg:px-10 lg:py-3"
                            href="{{ route_wlocale('modules.show', ['module' => $previousModule->slug, 'resourceType' => 'free-resources']) }}"
                        >
                            <span class="mr-4 inline-block font-semibold">&lt;</span>
                            <span class="inline-block font-semibold">Previous</span>
                        </x-button.primary>
                        <span
                            class="word-spacing-tight mt-5 text-sm leading-tight sm:text-base sm:leading-tight lg:text-lg lg:leading-tight"
                        >
                            {!! $previousModule->name !!}
                        </span>
                    </div>
                @endif
            </div>

            <div class="flex flex-1 justify-end">
                @if ($nextModule)
                    <div class="group flex flex-col items-end text-white">
                        <x-button.primary
                            class="flex tracking-widest uppercase lg:min-w-[185px] lg:justify-center lg:rounded-xl lg:px-10 lg:py-3"
                            href="{{ route_wlocale('modules.show', ['module' => $nextModule->slug, 'resourceType' => 'free-resources']) }}"
                        >
                            <span class="inline-block font-semibold">Next</span>
                            <span class="ml-4 inline-block font-semibold">&gt;</span>
                        </x-button.primary>
                        <span
                            class="word-spacing-tight mt-5 text-right text-sm leading-tight sm:text-base sm:leading-tight lg:text-lg lg:leading-tight"
                        >
                            {!! $nextModule->name !!}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
