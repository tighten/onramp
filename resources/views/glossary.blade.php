@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="relative fluid-container">
            <h1 class="max-w-lg">{{ __('Glossary') }}</h1>

            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/double-curve-dark-large.svg">

                <img
                    class="absolute right-0 -mr-32 pointer-events-none h-670-px opacity-10 top-1/2 transform -translate-y-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg"
                    alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="items-start py-8 fluid-container md:flex">
        <div class="w-full mb-6 md:pr-12">
            <div class="flex flex-col-reverse md:flex-row">
                <ul class="flex-grow pr-8 md:w-3/4">
                    @forelse ($terms as $term)
                    <li id="{{ $term->getEnglishName() }}" class="p-4 list-none  md:mt-6">
                        <div class="flex items-baseline justify-start mb-1 md:mb-3">
                            <a class="text-lg font-bold" href="#{{ $term->getEnglishName() }}">#</a>
                            <h3 class="ml-2 text-lg font-bold capitalize">
                                {{ $term->getTranslation('name', locale()) }}
                            </h3>
                            @if ($term->name !== $term->getEnglishName())
                                <span class="pl-1 text-sm capitalize text-grey-800">({{ $term->getEnglishName() }})</span>
                            @endif
                        </div>
                        <p class="mt-2">{{ $term->getTranslation('description', locale()) }}</p>
                        @if ($term->resourcesForCurrentSession()->count() > 0)
                        <div class="flex flex-col mt-4">
                            <span class="text-gray-800">Related resources:</span>
                            @foreach ($term->resourcesForCurrentSession()->get() as $resource)
                                <span>
                                    {{-- @todo update this to either show first module, all modules, or none if resource unassigned --}}

                                    {{-- <a href="{{ route_wlocale('modules.show', $resource->module()->first()) }}">{{ $resource->module()->first()->name }}</a> --}}
                                    &gt;
                                    <a href="{{ $resource->url }}">{{ $resource->name }} <img src="/images/outbound_link_icon.svg" alt="Outbound link" class="inline w-4 align-text-top"></a>
                                </span>
                            @endforeach
                        </div>
                        @endif
                        @if ($term->relatedTerms->count() > 0)
                            <div class="flex items-center mt-4">
                                <span class="text-gray-800">Related Terms:</span>
                                @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="px-3 ml-2 text-sm font-semibold text-gray-700 bg-gray-400 rounded-full" href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
                                @endforeach
                            </div>
                            @endif
                            @if ($term->relatedTerms->count() > 0)
                                <div class="flex items-center mt-4">
                                    <span class="text-gray-800">Related Terms:</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                        <a class="px-3 ml-2 text-sm font-semibold text-gray-700 bg-gray-400 rounded-full" href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
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

                <div class="w-full pb-4 mb-4 border-b md:mt-10 md:w-1/4 border-grey-100 md:border-none">
                    <h3 class="text-xl">{{ __('Table of contents') }}</h3>
                    <toggle-when-mobile class="mb-2">
                        <ul class="mt-4">
                            @forelse ($terms as $term)
                                <li class="pl-1 ml-4 leading-relaxed list-disc md:list-none md:ml-0 md:pl-0">
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
