@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="bg-indigo-100 overflow-hidden py-16 lg:py-24">
        <div class="container mx-auto px-5 relative lg:px-12">
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

    @include('partials.you-should-log-in')

    <div class="container mx-auto pt-12 pb-48 lg:pt-20">
        <div class="w-full"
            x-data="{ tab: 'beginner' }"
            x-on:load.window="tab = window.innerWidth >= 1024 ? 'all' : 'beginner'"
            x-on:resize.window="tab = window.innerWidth >= 1024 ? 'all' : 'beginner'"
            >
            <div class="h-8 overflow-hidden mb-8 lg:hidden">
                <div class="overflow-scroll pb-8 px-5 text-none whitespace-no-wrap text-regent-grey">
                    <button class="inline-block mr-5 font-semibold leading-tight tracking-tight text-xl duration-150 transition ease-in-out focus:outline-none hover:text-gray-700"
                        x-bind:class="{ 'text-gray-900': tab === 'beginner' }" x-on:click="tab='beginner'"><span>Beginner</span></button>

                    <button class="inline-block mr-5 font-semibold leading-tight tracking-tight text-xl duration-150 transition ease-in-out focus:outline-none hover:text-gray-700"
                        x-bind:class="{ 'text-gray-900': tab === 'intermediate' }" x-on:click="tab='intermediate'"><span>Intermediate</span></button>

                    <button class="inline-block font-semibold leading-tight tracking-tight text-xl duration-150 transition ease-in-out focus:outline-none hover:text-gray-700"
                        x-bind:class="{ 'text-gray-900': tab === 'advanced' }" x-on:click="tab='advanced'"><span>Advanced</span></button>
                </div>
            </div>

            <div class="px-2 lg:px-10" x-show="tab === 'beginner' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <h2 class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Beginner</h2>

                    @forelse ($standardModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
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

                @if ($bonusModules->isNotEmpty())
                    <div class="flex flex-wrap w-full mt-8">
                        <h3 class="mb-6 px-3 w-full font-semibold leading-tight tracking-tight text-xl text-east-bay lg:block lg:text-2xl">Bonus</h3>

                        @foreach ($bonusModules as $module)
                            <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                                <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                    href="{{ route_wlocale('modules.show', $module) }}">
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

            <div class="px-2 lg:px-10 lg:mt-32"
                x-show="tab === 'intermediate' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <h2 class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Intermediate</h2>

                    <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>

                    {{-- @forelse ($intermediateModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
                                <span class="pb-8/12 block xl:pb-3/5"></span>
                                <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                </span>
                            </a>
                        </div>
                    @empty
                        <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>
                    @endforelse --}}
                </div>
            </div>

            <div class="px-2 lg:px-10 lg:mt-32"
                x-show="tab === 'advanced' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <h2 class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Advanced</h2>

                    <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>

                    {{-- @forelse ($advancedModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <a class="flex flex-col h-full shadow-md duration-300 transform transition-transform hover:no-underline hover:scale-95 {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
                                <span class="pb-8/12 block xl:pb-3/5"></span>
                                <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                </span>
                            </a>
                        </div>
                    @empty
                        <p class="px-3 text-gray-700 italic">There are currently no modules here. Check back soon.</p>
                    @endforelse --}}
                </div>
            </div>

            {{-- <p class="mb-2 font-bold text-lg">Recommended modules</p>

            <ul class="@guest list-disc @endguest">
                @foreach ($standardModules as $module)
                <li>
                    @auth
                    <completed-checkbox
                        :initial-is-completed="{{ $completedModules->contains($module->id) ? 'true' : 'false' }}"
                        type="{{ $module->getMorphClass() }}"
                        id="{{ $module->id }}"
                        ></completed-checkbox>
                    @endauth
                    <a href="{{ route_wlocale('modules.show', $module) }}">{{ $module->name }}</a>
                </li>
                @endforeach
            </ul>

            @if ($bonusModules->isNotEmpty())
            <p class="mb-2 font-bold text-lg mt-8">Bonus modules</p>

            <ul class="@guest list-disc @endguest">
                @foreach ($bonusModules as $module)
                <li>
                    @auth
                    <completed-checkbox
                        :initial-is-completed="{{ $completedModules->contains($module->id) ? 'true' : 'false' }}"
                        type="{{ $module->getMorphClass() }}"
                        id="{{ $module->id }}"
                        ></completed-checkbox>
                    @endauth
                    <a href="{{ route_wlocale('modules.show', $module) }}">{{ $module->name }}</a>
                </li>
                @endforeach
            </ul>
            @endif --}}
        </div>
    </div>
</div>
@endsection
