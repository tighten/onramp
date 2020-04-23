@extends('layouts.app')

@php
$beginnerModules = $standardModules->where('skill_level', 'beginner');
$intermediateModules = $standardModules->where('skill_level', 'intermediate');
$advancedModules = $standardModules->where('skill_level', 'advanced');
@endphp

@section('content')
<div class="w-full bg-off-white">
    @include('partials.you-should-log-in')

    <div class="bg-indigo-100 overflow-hidden py-16 lg:py-24">
        <div class="fluid-container relative">
            <h1 class="max-w-lg">{{ __('Modules') }}</h1>

            <p class="leading-normal mt-4 max-w-md text-comet lg:mt-5">
                {{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}
            </p>

            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/double-curve-dark-large.svg">

                <img
                    class="absolute h-670-px -mr-32 opacity-10 pointer-events-none right-0 top-1/2 transform -translate-y-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg"
                    alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="pt-12 pb-48 lg:pt-20">
        <tabs :hide-tabs-on-desktop="true">
            <tab name="Beginner" :selected="true">
                <div class="fluid-container px-2 md:px-8 lg:px-20 xxl:px-32">
                    <h2 class="hidden mb-10 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Beginner</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($beginnerModules as $module)
                            <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                    href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                    <span class="pb-8/12 block relative xl:pb-3/5">
                                        <img class="absolute bottom-0 left-1/2 transform -translate-x-1/2 will-change-transform w-3/4"
                                            src="/images/temp/img_basicwebsite.svg" alt="Image for the {{ $module->name }} module.">
                                    </span>
                                    <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                        <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                    </span>
                                </a>
                            </div>
                        @empty
                            <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>

                    @if ($bonusModules->where('skill_level', 'beginner')->isNotEmpty())
                        <div class="flex flex-wrap w-full mt-8 md:px-1 lg:px-0 lg:-mx-3">
                            <h3 class="mb-6 px-3 w-full font-semibold leading-tight tracking-tight text-xl text-east-bay lg:block lg:text-2xl">Bonus</h3>

                            @foreach ($bonusModules->where('skill_level', 'beginner') as $module)
                                <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                    <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                        href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                        <span class="pb-8/12 block xl:pb-3/5"></span>
                                        <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                            <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </tab>

            <tab name="Intermediate">
                <div class="fluid-container px-2 md:px-8 lg:px-20 lg:mt-32 xxl:px-32">
                    <h2 class="hidden mb-10 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Intermediate</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($intermediateModules as $module)
                            <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-cornflower-blue' : 'bg-blue-violet' }}"
                                    href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                    <span class="pb-8/12 block relative xl:pb-3/5">
                                        {{-- <img
                                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 will-change-transform w-3/4"
                                            src="/images/temp/img_basicwebsite.svg" alt="Image for the {{ $module->name }} module."> --}}
                                    </span>
                                    <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                        <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                    </span>
                                </a>
                            </div>
                        @empty
                            <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>

                    @if ($bonusModules->where('skill_level', 'intermediate')->isNotEmpty())
                        <div class="flex flex-wrap w-full mt-8 md:px-1 lg:px-0 lg:-mx-3">
                            <h3 class="mb-6 px-3 w-full font-semibold leading-tight tracking-tight text-xl text-east-bay lg:block lg:text-2xl">Bonus</h3>

                            @foreach ($bonusModules->where('skill_level', 'intermediate') as $module)
                                <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                    <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-cornflower-blue' : 'bg-blue-violet' }}"
                                        href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                        <span class="pb-8/12 block xl:pb-3/5"></span>
                                        <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                            <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </tab>

            <tab name="Advanced">
                <div class="fluid-container px-2 md:px-8 lg:px-20 lg:mt-32 xxl:px-32">
                    <h2 class="hidden mb-10 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Advanced</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($advancedModules as $module)
                            <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-pink-900' : 'bg-pink-800' }}"
                                    href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                    <span class="pb-8/12 block relative xl:pb-3/5">
                                        {{-- <img
                                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 will-change-transform w-3/4"
                                            src="/images/temp/img_basicwebsite.svg" alt="Image for the {{ $module->name }} module."> --}}
                                    </span>
                                    <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                        <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                    </span>
                                </a>
                            </div>
                        @empty
                            <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>

                    @if ($bonusModules->where('skill_level', 'advanced')->isNotEmpty())
                        <div class="flex flex-wrap w-full mt-8 md:px-1 lg:px-0 lg:-mx-3">
                            <h3 class="mb-6 px-3 w-full font-semibold leading-tight tracking-tight text-xl text-east-bay lg:block lg:text-2xl">Bonus</h3>

                            @foreach ($bonusModules->where('skill_level', 'advanced') as $module)
                                <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                    <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-pink-900' : 'bg-pink-800' }}"
                                        href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                        <span class="pb-8/12 block xl:pb-3/5"></span>
                                        <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                            <h4 class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</h4>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </tab>
        </tabs>
    </div>
</div>
@endsection
