@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="relative fluid-container">
            <h1 class="max-w-xl">{{ __('Glossary') }}</h1>

            <picture>
                <source media="(min-width: 1024px)" srcset="/images/shapes/double-curve-dark-large.svg">

                <img class="absolute right-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px opacity-10 top-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg" alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="items-start pt-12 pb-24 fluid-container md:flex lg:pt-20">
        <div class="w-full mb-6">
            <div class="flex flex-col-reverse md:flex-row">
                <ul class="flex-grow sm:pr-8 lg:pr-12 md:w-3/4 xl:pr-24">
                    @forelse ($terms as $term)
                        <li id="{{ $term->getEnglishName() }}" class="mt-10 list-none">
                            <div class="flex items-baseline justify-start mb-1 md:mb-3">
                                <a class="text-lg font-bold" href="#{{ $term->getEnglishName() }}">#</a>
                                <h3 class="ml-2 text-lg font-semibold capitalize ">
                                    {{ $term->getTranslation('name', locale()) }}
                                </h3>
                                @if ($term->name !== $term->getEnglishName())
                                    <span class="pl-1 text-sm capitalize text-grey-800">({{ $term->getEnglishName() }})</span>
                                @endif
                            </div>

                            <div class="glossary-description mt-4 text-base text-gray-700 lg:text-lg">{!! (new Parsedown)->text($term->getTranslation('description', locale())) !!}</div>

                            @if ($term->resourcesForCurrentSession->count() > 0)
                                <div class="flex flex-col mt-4">
                                    <span class="text-gray-800">{{ __('Related resources:') }}</span>
                                    @foreach ($term->resourcesForCurrentSession()->get() as $resource)
                                    <span>
                                        {{-- @todo update this to either show first module, all modules, or none if resource unassigned --}}

                                        {{-- <a href="{{ route_wlocale('modules.show', $resource->module()->first()) }}">{{ $resource->module()->first()->name }}</a>
                                        --}}
                                        &gt;
                                        <a href="{{ $resource->url }}">{{ $resource->name }} <img
                                                src="/images/outbound_link_icon.svg" alt="Outbound link"
                                                class="inline w-4 align-text-top"></a>
                                    </span>
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="flex items-center mt-4">
                                    <span class="text-gray-800">{{ __('Related Terms:') }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="px-3 ml-2 text-sm font-semibold text-gray-700 bg-gray-400 rounded-full"
                                        href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="flex items-center mt-4">
                                    <span class="text-gray-800">{{ __('Related Terms:') }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="px-3 ml-2 text-sm font-semibold text-gray-700 bg-gray-400 rounded-full"
                                        href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
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

                <div class="w-full pb-3 mb-4 border-b md:mt-10 md:w-1/4 border-grey-100 md:border-none">
                    <h3 class="text-lg font-semibold">{{ __('Table of contents') }}</h3>
                    <toggle-when-mobile class="mt-5 mb-3">
                        <ul class="mt-6">
                            @forelse ($terms as $term)
                                <li class="block leading-relaxed list-none border-b border-gray-200 last:border-0 md:text-base">
                                    <a class="block py-3 px-3 capitalize transition-colors duration-150 ease-in-out hover:no-underline hover:bg-gray-100" href="#{{ $term->getEnglishName() }}">{{ $term->name }}</a>
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

@push('styles')
<style>
    .glossary-description p {
        margin-bottom: 2em;
    }
</style>
@endpush
