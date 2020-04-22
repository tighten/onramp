@php
use App\Resource;
@endphp

<div class="lg:hidden">
    <tabs-with-select :select-options="[
            'Videos &amp; Courses',
            'Articles &amp; Audio',
        ]"
    >
        <tab name="Videos &amp; Courses" :selected="true">
            <div class="bg-white border-t-4 border-teal-600 shadow-md js-show-more-less">
                <div class="pt-8 pr-5 pb-6 pl-6">
                    <p class="font-bold text-xl md:text-2xl">Videos &amp; Courses</p>

                    <ul class="mt-6 js-show-more-less-items">
                        @forelse ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">No resources</li>
                        @endforelse
                    </ul>
                </div>

                <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
                    View more
                </button>
            </div>

            @if ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                <div class="bg-white border-t-4 border-teal-600 shadow-md mt-6 js-show-more-less">
                    <div class="pt-8 pr-5 pb-6 pl-6">
                        <p class="font-bold text-xl">Bonus</p>

                        <ul class="mt-6 js-show-more-less-items">
                            @foreach ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
                        View more
                    </button>
                </div>
            @endif
        </tab>

        <tab name="Articles &amp; Audio">
            <div class="bg-white border-t-4 border-teal-600 shadow-md js-show-more-less">
                <div class="pt-8 pr-5 pb-6 pl-6">
                    <p class="font-bold text-xl md:text-2xl">Articles &amp; Audio</p>

                    <ul class="mt-6 js-show-more-less-items">
                        @forelse ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', false)->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li class="list-none">No resources</li>
                        @endforelse
                    </ul>
                </div>

                <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
                    View more
                </button>
            </div>

            @if ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true)->isNotEmpty())
                <div class="bg-white border-t-4 border-teal-600 shadow-md mt-6 js-show-more-less">
                    <div class="pt-8 pr-5 pb-6 pl-6">
                        <p class="font-bold text-xl">Bonus</p>

                        <ul class="mt-6 js-show-more-less-items">
                            @foreach ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true) as $resource)
                                @include('partials.resource-on-module-page')
                            @endforeach
                        </ul>
                    </div>

                    <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
                        View more
                    </button>
                </div>
            @endif
        </tab>
    </tabs-with-select>
</div>

<div class="hidden lg:flex lg:-mx-2">
    <div class="w-1/2 px-2">
        <div class="w-full h-full py-12 px-8 bg-white border-t-4 border-teal-600 shadow-md">
            <p class="flex items-center font-bold text-4xl">
                <svg class="h-8 w-8 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15"/>
                        <path fill="#e2e8f0" d="M12 9v13l8-7z"/>
                    </g>
                </svg>

                <span>Videos &amp; Courses</span>
            </p>

            <ul class="mt-6">
                @forelse ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page')
                @empty
                    <li class="list-none">No resources</li>
                @endforelse

                @if ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
                    <li class="mt-16 font-bold text-xl">Bonus</li>

                    @foreach ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="w-1/2 px-2">
        <div class="w-full h-full py-12 px-8 bg-white border-t-4 border-teal-600 shadow-md">
            <p class="flex items-center font-bold text-4xl">
                <svg class="h-8 w-8 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <g fill="none" fill-rule="evenodd">
                        <circle fill="#1a202c" cx="15" cy="15" r="15"/>
                        <rect stroke="#e2e8f0" stroke-width="2" x="9" y="8" width="12" height="15" rx="1"/>
                        <rect fill="#e2e8f0" x="12" y="12" width="6" height="2" rx="1"/>
                        <rect fill="#e2e8f0" x="12" y="16" width="6" height="2" rx="1"/>
                    </g>
                </svg>

                <span>Articles &amp; Audio</span>
            </p>

            <ul class="mt-6">
                @forelse ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page')
                @empty
                    <li class="list-none">No resources</li>
                @endforelse

                @if ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true)->isNotEmpty())
                    <li class="mt-16 font-bold text-xl">Bonus</li>

                    @foreach ($freeResources->whereIn('type', [Resource::ARTICLE_TYPE, Resource::AUDIO_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page')
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
