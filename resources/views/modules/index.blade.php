@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="bg-indigo-100 pt-16 pb-16">
        <div class="container mx-auto px-5 lg:px-12">
            <h1>{{ __('Modules') }}</h1>
            <p class="leading-normal mt-4">
                {{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}
            </p>
        </div>
    </div>

    @include('partials.you-should-log-in')

    <div class="container mx-auto pt-12 pb-48">
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

            <div class="px-2" x-show="tab === 'beginner' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <p class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Beginner</p>

                    @forelse ($standardModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 xl:w-1/4">
                            <a class="flex flex-col h-full shadow-md hover:no-underline {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
                                <span class="pb-8/12 block xl:pb-3/5"></span>
                                <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                </span>
                            </a>
                        </div>
                    @empty
                        <p class="px-3 text-gray-500 italic">There are currently no modules here. Check back soon.</p>
                    @endforelse
                </div>

                @if ($bonusModules->isNotEmpty())
                    <div class="flex flex-wrap w-full mt-8">
                        <p class="hidden mb-6 px-3 w-full font-semibold leading-tight tracking-tight text-2xl text-east-bay lg:block">Bonus</p>

                        @foreach ($bonusModules as $module)
                            <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 xl:w-1/4"><!-- w-80 sm:w-auto sm:max-w-xs-->
                                <a class="flex flex-col h-full shadow-md hover:no-underline {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                    href="{{ route_wlocale('modules.show', $module) }}">
                                    <span class="pb-8/12 block xl:pb-3/5"></span>
                                    <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                        <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="px-2 lg:mt-32"
                x-show="tab === 'intermediate' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <p class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Intermediate</p>

                    <p class="px-3 text-gray-500 italic">There are currently no modules here. Check back soon.</p>

                    {{-- @forelse ($intermediateModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 xl:w-1/4"><!-- w-80 sm:w-auto sm:max-w-xs-->
                            <a class="flex flex-col h-full shadow-md hover:no-underline {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
                                <span class="pb-8/12 block xl:pb-3/5"></span>
                                <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                </span>
                            </a>
                        </div>
                    @empty
                        <p class="px-3 text-gray-500 italic">There are currently no modules here. Check back soon.</p>
                    @endforelse --}}
                </div>
            </div>

            <div class="px-2 lg:mt-32"
                x-show="tab === 'advanced' || tab === 'all'">
                <div class="flex flex-wrap w-full">
                    <p class="hidden mb-10 px-3 w-full font-semibold leading-tight tracking-tight text-4xl text-gray-900 lg:block">Advanced</p>

                    <p class="px-3 text-gray-500 italic">There are currently no modules here. Check back soon.</p>

                    {{-- @forelse ($advancedModules as $module)
                        <div class="flex-initial pb-5 px-3 w-full sm:max-w-xs sm:w-1/2 xl:w-1/4"><!-- w-80 sm:w-auto sm:max-w-xs-->
                            <a class="flex flex-col h-full shadow-md hover:no-underline {{ $loop->even ? 'bg-teal-600' : 'bg-teal-400' }}"
                                href="{{ route_wlocale('modules.show', $module) }}">
                                <span class="pb-8/12 block xl:pb-3/5"></span>
                                <span class="block flex-1 p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                                    <p class="font-semibold tracking-tight text-east-bay">{{ $module->name }}</p>
                                </span>
                            </a>
                        </div>
                    @empty
                        <p class="px-3 text-gray-500 italic">There are currently no modules here. Check back soon.</p>
                    @endforelse --}}
                </div>
            </div>

            {{-- <p class="font-semibold leading-tight text-xl mb-10">All modules</p>

            <div class="flex flex-wrap w-full px-2">
                @foreach ($standardModules as $module)
                    <div class="px-2 w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">
                        <a class="mb-5 bg-white shadow-md block" href="{{ route_wlocale('modules.show', $module) }}">
                            <span class="bg-teal-600 pb-8/12 block"></span>
                            <span class="p-5 pb-6 block">
                                <p class="font-semibold">{{ $module->name }}</p>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($bonusModules->isNotEmpty())
                <p class="font-semibold leading-tight text-xl mb-10">Bonus modules</p>

                @foreach ($bonusModules as $module)
                    <a class="mb-5 bg-white shadow-md block" href="{{ route_wlocale('modules.show', $module) }}">
                        <span class="bg-teal-600 pb-8/12 block"></span>
                        <span class="p-5 pb-6 block">
                            <p class="font-semibold">{{ $module->name }}</p>
                        </span>
                    </a>
                @endforeach
            @endif --}}

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
