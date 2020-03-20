@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="bg-indigo-100 overflow-hidden py-16 lg:py-24">
        <div class="fluid-container relative">
            <h1 class="max-w-lg">{{ __('Glossary') }}</h1>

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

    <div class="fluid-container md:flex items-start py-8">
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
                        @if ($term->resourcesForCurrentSession()->count() > 0)
                        <div class="mt-4 flex flex-col">
                            <span class="text-gray-800">Related resources:</span>
                            @foreach ($term->resourcesForCurrentSession()->get() as $resource)
                                <span>
                                    {{-- @todo update this to either show first module, all modules, or none if resource unassigned --}}

                                    {{-- <a href="{{ route_wlocale('modules.show', $resource->module()->first()) }}">{{ $resource->module()->first()->name }}</a> --}}
                                    &gt;
                                    <a href="{{ $resource->url }}">{{ $resource->name }} <img src="/images/outbound_link_icon.svg" alt="Outbound link" class="w-4 inline align-text-top"></a>
                                </span>
                            @endforeach
                        </div>
                        @endif
                        @if ($term->relatedTerms->count() > 0)
                            <div class="mt-4 flex items-center">
                                <span class="text-gray-800">Related Terms:</span>
                                @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="ml-2 px-3 bg-gray-400 rounded-full text-sm font-semibold text-gray-700" href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
                                @endforeach
                            </div>
                            @endif
                            @if ($term->relatedTerms->count() > 0)
                                <div class="mt-4 flex items-center">
                                    <span class="text-gray-800">Related Terms:</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                        <a class="ml-2 px-3 bg-gray-400 rounded-full text-sm font-semibold text-gray-700" href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
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
                    <toggle-when-mobile class="mb-2">
                        <ul class="mt-4">
                            @forelse ($terms as $term)
                                <li class="leading-relaxed list-disc md:list-none ml-4 md:ml-0 pl-1 md:pl-0">
                                    <a class="capitalize" href="#{{ $term->getEnglishName() }}">{{ $term->name }}</a>
                                </li>
                            @empty
                                {{ __('No terms') }}
                            @endforelse
                        </ul>
                    </toggle-when-mobile>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
