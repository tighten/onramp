@extends('layouts.app')

@php
use App\Resource;
@endphp

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 bg-gray-100 border-b">
        <div class="mx-auto max-w-2xl">
            <h1 class=" text-xl md:text-4xl">{{ $module->name }}</h1>
            @if ($module->description)
                <p class="leading-loose text-gray-dark">
                    {{ $module->description }}
                </p>
            @endif
        </div>
    </div>

    @include('partials.you-should-log-in')

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full mb-6 md:px-10 lg:px-2">

            <resource-language-preference-switcher
                language="{{ Localization::languageForLocale(locale()) }}"
                initial-choice="{{ $currentResourceLanguagePreference }}"
                >
            </resource-language-preference-switcher>
            <div class="flex flex-wrap -mx-4 -my-2 md:-mx-2">
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Skills
                        </h3>
                        <ul class="@guest list-disc @endguest">
                            @forelse ($skills as $skill)
                                <li>
                                    @auth
                                    <completed-checkbox
                                        :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                        type="{{ $skill->getMorphClass() }}"
                                        id="{{ $skill->id }}"
                                        ></completed-checkbox>
                                    @endauth

                                    {{ $skill->name }}
                                </li>
                            @empty
                                <li class="list-none">No skills</li>
                            @endforelse

                            @if ($bonusSkills->isNotEmpty())
                                <li class="font-bold mt-4 list-none">BONUS:</li>
                                @foreach ($bonusSkills as $skill)
                                    <li>
                                        @auth
                                        <completed-checkbox
                                            :initial-is-completed="{{ $completedSkills->contains($skill->id) ? 'true' : 'false' }}"
                                            type="{{ $skill->getMorphClass() }}"
                                            id="{{ $skill->id }}"
                                            ></completed-checkbox>
                                        @endauth
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!--
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Quizzes
                        </h3>
                        <ul>
                            <li><input type="checkbox" checked="" value="on"> <a href="#">1: The basic rules of HTML</a></li>
                            <li><input type="checkbox" checked="" value="on"> <a href="#">2: Lists and tables</a></li>
                            <li><input type="checkbox" checked="" value="on"> <a href="#">3: Images, iframes, etc.</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">4: Basic CSS syntax</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">5: Styling global elements</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">6: Simple CSS inheritance</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">7: Media queries</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">8: Etc.</a></li>
                            <br>BONUS:
                            <li><input type="checkbox" value="on"> <a href="#">B1: Tailwind positioning basics</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Exercises
                        </h3>
                        <ul>
                            <li><input type="checkbox" value="on"> <a href="#">1. Build a basic HTML page with a table</a></li>
                            <li><input type="checkbox" value="on"> <a href="#">2. Style a sample page with CSS</a></li>
                            <br>BONUS:
                            <li><input type="checkbox" value="on"> <a href="#">B1. Style a sample page with TailwindCSS</a></li>
                        </ul>
                    </div>
                </div>
                -->
            </div>

            <h3 class="font-bold text-2xl mb-2 mt-6">
                Free resources
            </h3>

            @php
            $freeResources = $resources->where('is_free', true);
            $paidResources = $resources->where('is_free', false);
            @endphp

            <div class="flex flex-wrap -mx-4 -my-2 md:-mx-2">
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Videos/courses
                        </h3>
                        <ul class="@guest list-disc @endguest">
                            @forelse ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                                @include('partials.resource-on-module-page')
                            @empty
                                <li class="list-none">No resources</li>
                            @endforelse

                            @if ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                                <li class="font-bold mt-4 list-none">BONUS</li>
                                @foreach ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                                    @include('partials.resource-on-module-page')
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Articles &amp; audio
                        </h3>
                        <ul class="@guest list-disc @endguest">
                            @forelse ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', false)->all() as $resource)
                                @include('partials.resource-on-module-page')
                            @empty
                                <li class="list-none">No resources</li>
                            @endforelse

                            @if ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true)->isNotEmpty())
                                <li class="font-bold mt-4 list-none">BONUS</li>
                                @foreach ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true) as $resource)
                                    @include('partials.resource-on-module-page')
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <h3 class="font-bold text-2xl mb-2 mt-6">
                Paid resources
            </h3>

            <div class="flex flex-wrap -mx-4 -my-2 md:-mx-2">
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Videos/courses
                        </h3>
                        <ul class="@guest list-disc @endguest">
                            @forelse ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                                @include('partials.resource-on-module-page')
                            @empty
                                <li class="list-none">No resources</li>
                            @endforelse

                            @if ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                                <li class="font-bold mt-4 list-none">BONUS</li>
                                @foreach ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                                    @include('partials.resource-on-module-page')
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex-grow w-full px-4 py-2 md:w-1/2 md:px-2">
                    <div class="py-4 px-8 rounded border h-full">
                        <h3 class="font-bold text-lg border-b mb-4">
                            Books
                        </h3>
                        <ul class="@guest list-disc @endguest">
                            @forelse ($paidResources->whereIn('type', [Resource::BOOK_TYPE])->where('is_bonus', false)->all() as $resource)
                                @include('partials.resource-on-module-page')
                            @empty
                                <li class="list-none">No resources</li>
                            @endforelse

                            @if ($paidResources->whereIn('type', [Resource::BOOK_TYPE])->where('is_bonus', true)->isNotEmpty())
                                <li class="font-bold mt-4">BONUS</li>
                                @foreach ($paidResources->whereIn('type', ['book'])->where('is_bonus', true) as $resource)
                                    @include('partials.resource-on-module-page')
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
