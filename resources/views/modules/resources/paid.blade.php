@php
    use App\Models\Resource;
@endphp

<div class="lg:hidden">
    <tabs-with-select :select-options="['Videos &amp; Courses', 'Books, Articles &amp; Audio']">
        <tab name="Videos &amp; Courses" :selected="true">
            <div class="border-teal js-show-more-less border-t-4 bg-white shadow-md">
                <div class="pt-8 pr-5 pb-6 pl-6">
                    <p class="text-xl font-bold md:text-2xl">Videos &amp; Courses</p>

                    <ul class="js-show-more-less-items mt-6">
                        @forelse ($paidResources
                                ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                                ->where('is_bonus', false)
                                ->all()
                            as $resource)
                            @include ('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">No resources</li>
                        @endforelse
                    </ul>
                </div>

                <button
                    class="border-gray/30 text-persian-green js-show-more-less-button w-full border-t-2 px-8 py-4 text-left font-semibold"
                >
                    View more
                </button>
            </div>

            @if ($paidResources
                    ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                    ->where('is_bonus', true)
                    ->isNotEmpty())
                <div class="border-teal js-show-more-less mt-6 border-t-4 bg-white shadow-md">
                    <div class="pt-8 pr-5 pb-6 pl-6">
                        <p class="text-xl font-bold">{{ __('Bonus') }}</p>

                        <ul class="js-show-more-less-items mt-6">
                            @foreach ($paidResources
                                    ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                                    ->where('is_bonus', true)
                                as $resource)
                                @include ('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button
                        class="border-silver text-persian-green js-show-more-less-button w-full border-t-2 px-8 py-4 text-left font-semibold"
                    >
                        {{
                            __(
                                'View more',
                            )
                        }}
                    </button>
                </div>
            @endif
        </tab>

        <tab name="Books, Articles &amp; Audio">
            <div class="border-teal js-show-more-less border-t-4 bg-white shadow-md">
                <div class="pt-8 pr-5 pb-6 pl-6">
                    <p class="text-xl font-bold md:text-2xl">{{
                        __(
                            'Books, Articles & Audio',
                        )
                    }}</p>

                    <ul class="js-show-more-less-items mt-6">
                        @forelse ($paidResources
                                ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                                ->where('is_bonus', false)
                                ->all()
                            as $resource)
                            @include ('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">
                                {{
                                    __(
                                        'No resources',
                                    )
                                }}
                            </li>
                        @endforelse
                    </ul>
                </div>

                <button
                    class="border-silver text-persian-green js-show-more-less-button w-full border-t-2 px-8 py-4 text-left font-semibold"
                >
                    {{
                        __(
                            'View more',
                        )
                    }}
                </button>
            </div>

            @if ($paidResources
                    ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                    ->where('is_bonus', true)
                    ->isNotEmpty())
                <div class="border-teal js-show-more-less mt-6 border-t-4 bg-white shadow-md">
                    <div class="pt-8 pr-5 pb-6 pl-6">
                        <p class="text-xl font-bold">{{ __('Bonus') }}</p>

                        <ul class="js-show-more-less-items mt-6">
                            @foreach ($paidResources
                                    ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                                    ->where('is_bonus', true)
                                as $resource)
                                @include ('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button
                        class="border-silver text-persian-green js-show-more-less-button w-full border-t-2 px-8 py-4 text-left font-semibold"
                    >
                        {{
                            __(
                                'View more',
                            )
                        }}
                    </button>
                </div>
            @endif
        </tab>
    </tabs-with-select>
</div>

<div class="hidden lg:-mx-2 lg:flex">
    <div class="w-1/2 px-2">
        <div class="border-teal h-full w-full border-t-4 bg-white px-8 py-12 shadow-md">
            <p class="flex items-start text-4xl font-bold">
                <svg
                    class="mt-2 mr-5 h-8 w-8 flex-none"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 30 30"
                >
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15" />
                        <path fill="#e2e8f0" d="M12 9v13l8-7z" />
                    </g>
                </svg>

                <span>{{
                    __(
                        'Videos & Courses',
                    )
                }}</span>
            </p>

            <ul class="mt-6 pl-1">
                @forelse ($paidResources
                        ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                        ->where('is_bonus', false)
                        ->all()
                    as $resource)
                    @include ('partials.resource-on-module-page')
                @empty
                    <li class="list-none">
                        {{
                            __(
                                'No resources',
                            )
                        }}
                    </li>
                @endforelse

                @if ($paidResources
                        ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                        ->where('is_bonus', true)
                        ->isNotEmpty())
                    <li class="mt-16 text-xl font-bold">{{ __('Bonus') }}</li>
                    @foreach ($paidResources
                            ->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])
                            ->where('is_bonus', true)
                        as $resource)
                        @include ('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="w-1/2 px-2">
        <div class="border-teal h-full w-full border-t-4 bg-white px-8 py-12 shadow-md">
            <p class="flex items-start text-4xl font-bold">
                <svg
                    class="mt-2 mr-5 h-8 w-8 flex-none"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 30 30"
                >
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15" />
                        <rect
                            stroke="#e2e8f0"
                            stroke-width="2"
                            x="9"
                            y="8"
                            width="12"
                            height="15"
                            rx="1"
                        />
                        <rect fill="#e2e8f0" x="12" y="12" width="6" height="2" rx="1" />
                        <rect fill="#e2e8f0" x="12" y="16" width="6" height="2" rx="1" />
                    </g>
                </svg>

                <span>{{
                    __(
                        'Books, Articles & Audio',
                    )
                }}</span>
            </p>

            <ul class="mt-6 pl-1">
                @forelse ($paidResources
                        ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                        ->where('is_bonus', false)
                        ->all()
                    as $resource)
                    @include ('partials.resource-on-module-page')
                @empty
                    <li class="list-none">
                        {{
                            __(
                                'No resources',
                            )
                        }}
                    </li>
                @endforelse

                @if ($paidResources
                        ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                        ->where('is_bonus', true)
                        ->isNotEmpty())
                    <li class="mt-16 text-xl font-bold">{{ __('Bonus') }}</li>
                    @foreach ($paidResources
                            ->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])
                            ->where('is_bonus', true)
                        as $resource)
                        @include ('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
