@php
use App\Resource;
@endphp

<div class="lg:hidden">
    <tabs-with-select :select-options="[
            'Videos &amp; Courses',
            'Books, Articles &amp; Audio',
        ]"
    >
        <tab name="Videos &amp; Courses" :selected="true">
            <div class="bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
                <div class="pt-8 pb-6 pl-6 pr-5">
                    <p class="text-xl font-bold md:text-2xl">Videos &amp; Courses</p>

                    <ul class="mt-6 js-show-more-less-items">
                        @forelse ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">No resources</li>
                        @endforelse
                    </ul>
                </div>

                <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
                    View more
                </button>
            </div>

            @if ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                <div class="mt-6 bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
                    <div class="pt-8 pb-6 pl-6 pr-5">
                        <p class="text-xl font-bold">Bonus</p>

                        <ul class="mt-6 js-show-more-less-items">
                            @foreach ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
                        View more
                    </button>
                </div>
            @endif
        </tab>

        <tab name="Articles &amp; Audio">
            <div class="bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
                <div class="pt-8 pb-6 pl-6 pr-5">
                    <p class="text-xl font-bold md:text-2xl">Books, Articles &amp; Audio</p>

                    <ul class="mt-6 js-show-more-less-items">
                        @forelse ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">No resources</li>
                        @endforelse
                    </ul>
                </div>

                <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
                    View more
                </button>
            </div>

            @if ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', true)->isNotEmpty())
                <div class="mt-6 bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
                    <div class="pt-8 pb-6 pl-6 pr-5">
                        <p class="text-xl font-bold">Bonus</p>

                        <ul class="mt-6 js-show-more-less-items">
                            @foreach ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
                        View more
                    </button>
                </div>
            @endif
        </tab>
    </tabs-with-select>
</div>

<div class="hidden lg:flex lg:-mx-2">
    <div class="w-1/2 px-2">
        <div class="w-full h-full px-8 py-12 bg-white border-t-4 border-teal-700 shadow-md">
            <p class="flex items-start text-4xl font-bold">
                <svg class="flex-none w-8 h-8 mt-2 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15"/>
                        <path fill="#e2e8f0" d="M12 9v13l8-7z"/>
                    </g>
                </svg>

                <span>Videos &amp; Courses</span>
            </p>

            <ul class="pl-1 mt-6">
                @forelse ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page')
                @empty
                    <li class="list-none">No resources</li>
                @endforelse

                @if ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                    <li class="mt-16 text-xl font-bold">Bonus</li>

                    @foreach ($paidResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="w-1/2 px-2">
        <div class="w-full h-full px-8 py-12 bg-white border-t-4 border-teal-700 shadow-md">
            <p class="flex items-start text-4xl font-bold">
                <svg class="flex-none w-8 h-8 mt-2 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15"/>
                        <rect stroke="#e2e8f0" stroke-width="2" x="9" y="8" width="12" height="15" rx="1"/>
                        <rect fill="#e2e8f0" x="12" y="12" width="6" height="2" rx="1"/>
                        <rect fill="#e2e8f0" x="12" y="16" width="6" height="2" rx="1"/>
                    </g>
                </svg>

                <span>Books, Articles &amp; Audio</span>
            </p>

            <ul class="pl-1 mt-6">
                @forelse ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page')
                @empty
                    <li class="list-none">No resources</li>
                @endforelse

                @if ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', true)->isNotEmpty())
                    <li class="mt-16 text-xl font-bold">Bonus</li>

                    @foreach ($paidResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE, Resource::BOOK_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
