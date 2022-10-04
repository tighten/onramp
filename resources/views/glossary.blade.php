@extends('layouts.app')

@section('content')
    <x-hero id="top">
        <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('Glossary') }}</h1>
		<p class="max-w-96">{{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}</p>
    </x-hero>

    <x-panel flex>
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

                            <div class="mt-4 text-base text-steel glossary-description lg:text-lg">{!! (new Parsedown)->text($term->getTranslation('description', locale())) !!}</div>

                            @if ($term->resourcesForCurrentSession->count() > 0)
                                <div class="flex flex-col mt-4">
                                    <span class="mb-2 font-semibold">{{ __('Related resources:') }}</span>
                                    @foreach ($term->resourcesForCurrentSession()->get() as $resource)
                                    <span>
                                        <a class="underline" href="{{ route_wlocale('modules.show', ['module' => $resource->modules()->first(), 'resourceType' => $resource->is_free ? 'free-resources' : 'paid-resources']) }}">{{ $resource->modules()->first()->name }}</a>
                                        &gt;
                                        <a class="inline-flex items-center" href="{{ $resource->url }}">
                                            <span class="underline">{{ $resource->name }}</span>
                                            <img src="/images/outbound_link_icon.svg" alt="Outbound link" class="inline w-4 ml-2 align-text-top">
                                        </a>
                                    </span>
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="flex items-center mt-4">
                                    <span class="text-steel">{{ __('Related Terms:') }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="px-3 ml-2 text-sm font-semibold rounded-full text-steel bg-gray"
                                        href="#{{ $relatedTerm->name }}">#{{ $relatedTerm->name }}</a>
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="flex items-center mt-4">
                                    <span class="text-steel">{{ __('Related Terms:') }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                    <a class="px-3 ml-2 text-sm font-semibold rounded-full text-steel bg-gray"
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
    </x-panel>
</div>
@endsection

@push('styles')
<style>
    .glossary-description p {
        margin-bottom: 2em;
    }
</style>
@endpush
