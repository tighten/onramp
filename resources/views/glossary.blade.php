@extends ('layouts.app')

@section ('content')
    <x-hero id="top">
        <h1 class="h2 md:h1 mb-2 font-bold tracking-wide">
            {{
                __(
                    'Glossary',
                )
            }}
        </h1>
        <p class="max-w-96">{{
            __(
                'The tech concepts you should know in order to get a job as a Laravel developer.',
            )
        }}</p>
    </x-hero>
    <x-panel flex>
        <div class="mb-6 w-full">
            <div class="flex flex-col-reverse md:flex-row">
                <ul class="flex-grow sm:pr-8 md:w-3/4 lg:pr-12 xl:pr-24">
                    @forelse ($terms as $term)
                        <li id="{{ $term->getEnglishName() }}" class="mt-10 list-none">
                            <div class="mb-1 flex items-baseline justify-start md:mb-3">
                                <a class="text-lg font-bold" href="#{{ $term->getEnglishName() }}">
                                    <h3 class="ml-2 text-lg font-semibold capitalize">
                                        # {{ $term->getTranslation('name', locale()) }}
                                    </h3>
                                </a>

                                @if ($term->name !== $term->getEnglishName())
                                    <span class="pl-1 text-sm capitalize"
                                        >({{ $term->getEnglishName() }})</span
                                    >
                                @endif
                            </div>

                            <div class="text-steel glossary-description mt-4 text-base lg:text-lg">
                                {!!
                                    new Parsedown()->text(
                                        $term->getTranslation('description', locale()),
                                    )
                                !!}
                            </div>

                            @if ($term->resourcesForCurrentSession->count() > 0)
                                <div class="mt-4 flex flex-col">
                                    <span class="mb-2 font-semibold">{{
                                        __(
                                            'Related resources:',
                                        )
                                    }}</span>
                                    @foreach ($term->resourcesForCurrentSession()->get() as $resource)
                                        <span>
                                            <a
                                                class="underline"
                                                href="{{ route_wlocale('modules.show', ['module' => $resource->modules()->first(), 'resourceType' => $resource->is_free ? 'free-resources' : 'paid-resources']) }}"
                                                >{{
                                                    $resource->modules()->first()
                                                        ->name
                                                }}</a
                                            >
                                            &gt;
                                            <a
                                                class="inline-flex items-center"
                                                href="{{ $resource->url }}"
                                            >
                                                <span class="underline">{{ $resource->name }}</span>
                                                <img
                                                    src="/images/outbound_link_icon.svg"
                                                    alt="Outbound link"
                                                    class="ml-2 inline w-4 align-text-top"
                                                />
                                            </a>
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="mt-4 flex items-center">
                                    <span class="text-steel">{{
                                        __(
                                            'Related Terms:',
                                        )
                                    }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                        <a
                                            class="text-steel bg-gray ml-2 rounded-full px-3 text-sm font-semibold"
                                            href="#{{ $relatedTerm->name }}"
                                            >#{{ $relatedTerm->name }}</a
                                        >
                                    @endforeach
                                </div>
                            @endif

                            @if ($term->relatedTerms->count() > 0)
                                <div class="mt-4 flex items-center">
                                    <span class="text-steel">{{
                                        __(
                                            'Related Terms:',
                                        )
                                    }}</span>
                                    @foreach ($term->relatedTerms as $relatedTerm)
                                        <a
                                            class="text-steel bg-gray ml-2 rounded-full px-3 text-sm font-semibold"
                                            href="#{{ $relatedTerm->name }}"
                                            >#{{ $relatedTerm->name }}</a
                                        >
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @empty
                        <li class="m-4 mt-6 list-none">
                            {{
                                __(
                                    'No terms',
                                )
                            }}
                        </li>
                    @endforelse
                </ul>

                <div class="mb-4 w-full border-b pb-3 md:mt-10 md:w-1/4 md:border-none">
                    <h3 class="text-lg font-semibold">
                        {{
                            __(
                                'Table of contents',
                            )
                        }}
                    </h3>
                    <toggle-when-mobile class="mt-5 mb-3">
                        <ul class="mt-6">
                            @forelse ($terms as $term)
                                <li class="block list-none leading-relaxed md:text-base">
                                    <a
                                        class="hover:bg-silver/50 block p-3 capitalize transition-colors duration-200 ease-in-out hover:no-underline"
                                        href="#{{ $term->getEnglishName() }}"
                                        >{{ $term->name }}</a
                                    >
                                </li>
                            @empty
                                {{
                                    __(
                                        'No terms',
                                    )
                                }}
                            @endforelse
                        </ul>
                    </toggle-when-mobile>
                </div>
            </div>
        </div>
    </x-panel>
    </div>
@endsection

@push ('styles')
    <style>
        .glossary-description p {
            margin-bottom: 2em;
        }
    </style>
@endpush
