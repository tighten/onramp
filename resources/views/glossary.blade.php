@extends('layouts.app')

@section('content')
    <section class="grid w-full grid-cols-1 py-8 overflow-x-hidden text-center text-white lg:mt-32 md:px-0 md:pb-0 sm:overflow-visible md:grid-cols-3 bg-blue-black">
        <div class="mx-auto md:ml-0 md:place-self-start">
            @include('partials.svg.path-sm')
        </div>

        <div class="flex flex-col items-center justify-center order-first px-4 md:order-none max-w-96">
            <h1 class="mb-2 font-bold tracking-normal h2 md:h1">{{ __('Glossary') }}</h1>
            <p class="mb-8">{{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}</p>
        </div>

        <div class="hidden origin-center rotate-180 md:block">
            @include('partials.svg.path-sm')
        </div>
    </section>

    <div class="items-start w-full pt-12 pb-24 -mt-px bg-white rounded-b fluid-container md:flex lg:pt-20">
        <div class="w-full mb-6">
            <div class="flex flex-col-reverse md:flex-row">
                <ul class="flex-grow sm:pr-8 lg:pr-12 md:w-3/4 xl:pr-24">
                    @forelse ($terms as $term)
                        <li id="{{ $term->getEnglishName() }}" class="mt-10 list-none">
                            <div class="flex items-baseline justify-start mb-1 md:mb-3">
                                <a class="text-lg font-bold" href="#{{ $term->getEnglishName() }}">
                                    <h3 class="ml-2 text-lg font-semibold capitalize">
                                        #    {{ $term->getTranslation('name', locale()) }}
                                    </h3>
                                </a>

                                @if ($term->name !== $term->getEnglishName())
                                    <span class="pl-1 text-sm capitalize">({{ $term->getEnglishName() }})</span>
                                @endif
                            </div>

                            <div class="mt-4 text-base text-gray-700 glossary-description lg:text-lg">{!! (new Parsedown)->text($term->getTranslation('description', locale())) !!}</div>

                            @if ($term->resourcesForCurrentSession->count() > 0)
                                <div class="flex flex-col mt-4">
                                    <span>{{ __('Related resources:') }}</span>
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

                <div class="w-full pb-3 mb-4 border-b md:mt-10 md:w-1/4 md:border-none">
                    <h3 class="text-lg font-semibold">{{ __('Table of contents') }}</h3>
                    <toggle-when-mobile class="mt-5 mb-3">
                        <ul class="mt-6">
                            @forelse ($terms as $term)
                                <li class="block leading-relaxed list-none md:text-base">
                                    <a class="block p-3 capitalize transition-colors duration-200 ease-in-out hover:no-underline hover:bg-silver hover:bg-opacity-50" href="#{{ $term->getEnglishName() }}">{{ $term->name }}</a>
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
