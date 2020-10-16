<div>
    <div class="bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
        <div class="pt-8 pb-6 lg:pt-12">
            <p class="pl-6 pr-5 text-xl font-bold lg:px-12">{{ __('Basic') }}</p>

            <ul class="mt-6 lg:mt-10 js-show-more-less-items">
                {{-- @todo update this to be exercises --}}

                {{-- @forelse ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page-with-border')
                @empty --}}
                    <li class="px-6 pb-4 list-none lg:px-12">{{ __('No exercises') }}</li>
                {{-- @endforelse --}}
            </ul>
        </div>

        <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
            {{ __('View more') }}
        </button>
    </div>

    {{-- @todo update this to be exercises --}}

    {{-- @if ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
        <div class="mt-6 bg-white border-t-4 border-teal-700 shadow-md js-show-more-less">
            <div class="pt-8 pb-6 lg:pt-12">
                <p class="pl-6 pr-5 text-xl font-bold lg:px-12">Bonus</p>

                <ul class="mt-6 lg:mt-10 js-show-more-less-items">
                    @foreach ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page-with-border')
                    @endforeach
                </ul>
            </div>

            <button class="hidden block w-full px-8 py-4 font-semibold text-left border-t-2 border-gray-300 text-persian-green js-show-more-less-button">
                View more
            </button>
        </div>
    @endif --}}
</div>
