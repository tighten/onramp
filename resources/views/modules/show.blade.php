@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl">{{ $module->name }}</h1>
    </div>

    @include('partials.you-should-log-in')

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-6">

            <resource-language-preference-switcher
                language="{{ Localization::languageForLocale(locale()) }}"
                initial-choice="{{ $currentResourceLanguagePreference }}"
                user="{{ /* @todo allow this to keep session/cookie preference for non-authorized users */ auth()->user() }}">
            </resource-language-preference-switcher>
            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb">
                        Skills
                    </h3>
                    <ul>
                        @forelse ($skills as $skill)
                            <li>
                                @auth
                                <!--input type="checkbox"{{ $completedSkills->contains($skill->id) ? ' checked="checked"' : '' }}-->
                                @endauth
                                &bull; {{ $skill->name }}
                            </li>
                        @empty
                            <li>No skills</li>
                        @endforelse

                        @if ($bonusSkills->isNotEmpty())
                            <li class="font-bold mt-4">BONUS:</li>
                            @foreach ($bonusSkills as $skill)
                                <li>
                                    @auth
                                    <!--input type="checkbox"{{ $completedSkills->contains($skill->id) ? ' checked="checked"' : '' }}-->
                                    @endauth
                                    &bull; {{ $skill->name }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!--
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
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
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Exercises
                    </h3>
                    <ul>
                        <li><input type="checkbox" value="on"> <a href="#">1. Build a basic HTML page with a table</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">2. Style a sample page with CSS</a></li>
                        <br>BONUS:
                        <li><input type="checkbox" value="on"> <a href="#">B1. Style a sample page with TailwindCSS</a></li>
                    </ul>
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

            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Videos/courses
                    </h3>
                    <ul>
                        @forelse ($freeResources->whereIn('type', ['video', 'course'])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse

                        @if ($freeResources->whereIn('type', ['video', 'course'])->where('is_bonus', true)->isNotEmpty())
                            <li class="font-bold mt-4">BONUS</li>
                            @foreach ($freeResources->whereIn('type', ['video', 'course'])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Articles &amp; audio
                    </h3>
                    <ul>
                        @forelse ($freeResources->whereIn('type', ['article', 'audio'])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse

                        @if ($freeResources->whereIn('type', ['article', 'audio'])->where('is_bonus', true)->isNotEmpty())
                            <li class="font-bold mt-4">BONUS</li>
                            @foreach ($freeResources->whereIn('type', ['article', 'audio'])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <h3 class="font-bold text-2xl mb-2 mt-6">
                Paid resources
            </h3>

            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Videos/courses
                    </h3>
                    <ul>
                        @forelse ($paidResources->whereIn('type', ['video', 'course'])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse

                        @if ($paidResources->whereIn('type', ['video', 'course'])->where('is_bonus', true)->isNotEmpty())
                            <li class="font-bold mt-4">BONUS</li>
                            @foreach ($paidResources->whereIn('type', ['video', 'course'])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Books
                    </h3>
                    <ul>
                        @forelse ($paidResources->whereIn('type', ['book'])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse

                        @if ($paidResources->whereIn('type', ['book'])->where('is_bonus', true)->isNotEmpty())
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
@endsection
