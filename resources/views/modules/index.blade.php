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

    <div class="pt-12 pb-48 lg:pt-20">
        @if ($bonusModules->isNotEmpty())
            <div class="px-2 fluid-container md:px-8 lg:px-20 xxl:px-32">
                <div class="flex flex-wrap w-full mt-8 md:px-1 lg:px-0 lg:-mx-3">
                    <h3 class="w-full px-3 mb-6 text-3xl font-semibold leading-tight tracking-tight text-gray-900 lg:block lg:text-4xl">Bonus</h3>

                    @foreach ($bonusModules as $module)
                        @php
                            $bgColor = 'bg-teal-400';

                            switch($module->skill_level) {
                                case 'intermediate':
                                    $bgColor = 'bg-cornflower-blue';
                                    break;
                                case 'advanced':
                                    $bgColor = 'bg-pink-800';
                                    break;
                                default:
                                    break;
                            }
                        @endphp

                        <div class="flex-initial w-full px-3 pb-5 sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $bgColor }}"
                                href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
                                <span class="block pb-8/12 xl:pb-3/5"></span>
                                <span class="flex-1 block p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <h4 class="font-semibold tracking-tighter text-east-bay">{{ $module->name }}</h4>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <tabs class="mt-12 lg:mt-32" :hide-tabs-on-desktop="true">
            <tab name="Beginner" :selected="true">
                <div class="px-2 fluid-container md:px-8 lg:px-20 xxl:px-32">
                    <h2 class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-gray-900 lg:block">Beginner</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($standardModules->whereIn('skill_level', 'beginner')->all() as $module)
                            @include('partials.card-on-module-listing-page')
                        @empty
                            <p class="px-3 text-gray-500">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>

                    {{-- @if ($bonusModules->where('skill_level', 'beginner')->isNotEmpty())
                        <div class="flex flex-wrap w-full mt-8 md:px-1 lg:px-0 lg:-mx-3">
                            <h3 class="w-full px-3 mb-6 text-xl font-semibold leading-tight tracking-tight text-east-bay lg:block lg:text-2xl">Bonus</h3>

                            @foreach ($bonusModules->where('skill_level', 'beginner') as $module)
                                @include('partials.card-on-module-listing-page')
                            @endforeach
                        </div>
                    @endif --}}
                </div>
            </tab>

            <tab name="Intermediate">
                <div class="px-2 fluid-container md:px-8 lg:px-20 lg:mt-32 xxl:px-32">
                    <h2 class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-gray-900 lg:block">Intermediate</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($standardModules->whereIn('skill_level', 'intermediate')->all() as $module)
                            @include('partials.card-on-module-listing-page')
                        @empty
                            <p class="px-3 text-gray-500">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>
                </div>
            </tab>

            <tab name="Advanced">
                <div class="px-2 fluid-container md:px-8 lg:px-20 lg:mt-32 xxl:px-32">
                    <h2 class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-gray-900 lg:block">Advanced</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        @forelse ($standardModules->whereIn('skill_level', 'advanced')->all() as $module)
                            @include('partials.card-on-module-listing-page')
                        @empty
                            <p class="px-3 text-gray-500">There are currently no modules here. Check back soon.</p>
                        @endforelse
                    </div>
                </div>
            </tab>
        </tabs>
    </div>
</div>
@endsection
