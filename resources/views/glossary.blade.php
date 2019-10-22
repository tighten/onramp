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
                    <li id="{{ $term->getEnglishName() }}" class=" md:mt-6 py-4 list-none">
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
