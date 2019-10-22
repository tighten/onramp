@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl">{{ __('Glossary') }}</h1>
    </div>
    <!-- /title -->

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full md:pr-12 mb-6">
            <div class="flex flex-col-reverse md:flex-row">
                <ul class="md:w-3/4 flex-grow pr-8">
                    @forelse ($terms as $term)
                    <li id="{{ $term->getEnglishName() }}" class=" md:mt-6 p-4 list-none">
                        <div class="flex justify-start items-baseline mb-1 md:mb-3">
                            <a class="text-lg font-bold" href="#{{ $term->getEnglishName() }}">#</a>
                            <h3 class="ml-2 font-bold text-lg capitalize">
                                {{ $term->getTranslation('name', locale()) }}
                            </h3>
                            @if ($term->name !== $term->getEnglishName())
                                <span class="pl-1 text-grey-800 capitalize text-sm">({{ $term->getEnglishName() }})</span>
                            @endif
                        </div>
                        <p class="mt-2">{{ $term->getTranslation('description', locale()) }}</p>
                        @if (count($term->resourcesForUser())>0)
                        <div class="mt-4 flex flex-col">
                            <span>Onramp suggested learning:</span>
                            @foreach ($term->resourcesForUser() as $resource)
                                <span>
                                    <a href="{{ route_wlocale('modules.show', $resource->module()->first()) }}">{{ $resource->module()->first()->name }}</a>
                                    &gt;
                                    <a href="{{ $resource->url }}">{{ $resource->name }}</a>
                                </span>
                            @endforeach
                        </div>
                        @endif
                    </li>
                    @empty
                    <li class="m-4 mt-6 list-none">
                        {{ __('No terms') }}
                    </li>
                    @endforelse
                </ul>
                <div class="md:mt-10 mb-4 pb-4 w-full md:w-1/4 border-b border-grey-100 md:border-none">
                    <h3 class="text-xl">{{ __('Table of contents') }}</h3>
                    <!-- Mobile -->
                    <toggle class="mb-2 md:hidden">
                        <ul class="mt-4">
                            @forelse ($terms as $term)
                                <li class="leading-relaxed list-disc ml-4 pl-1">
                                    <a class="capitalize" href="#{{ $term->getEnglishName() }}">{{ $term->name }}</a>
                                </li>
                            @empty
                                {{ __('No terms') }}
                            @endforelse
                        </ul>
                    </toggle>

                    <!-- Desktop -->
                    <ul class="mt-4 hidden md:block">
                        @forelse ($terms as $term)
                            <li class="leading-relaxed">
                                <a class="capitalize" href="#{{ $term->getEnglishName() }}">{{ $term->name }}</a>
                            </li>
                        @empty
                            {{ __('No terms') }}
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
