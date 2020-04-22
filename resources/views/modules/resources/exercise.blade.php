<div>
    <div class="bg-white border-t-4 border-teal-600 shadow-md js-show-more-less">
        <div class="pt-8 pb-6 lg:pt-12">
            <p class="pr-5 pl-6 font-bold text-xl lg:px-12">Basic</p>

            <ul class="mt-6 lg:mt-10 js-show-more-less-items">
                {{-- @todo update this to be exercises --}}

                {{-- @forelse ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', false)->all() as $resource)
                    @include('partials.resource-on-module-page-with-border')
                @empty --}}
                    <li class="list-none pb-4 px-6 lg:px-12">No resources</li>
                {{-- @endforelse --}}
            </ul>
        </div>

        <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
            View more
        </button>
    </div>

    {{-- @todo update this to be exercises --}}

    {{-- @if ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true)->isNotEmpty())
        <div class="bg-white border-t-4 border-teal-600 shadow-md mt-6 js-show-more-less">
            <div class="pt-8 pb-6 lg:pt-12">
                <p class="pr-5 pl-6 font-bold text-xl lg:px-12">Bonus</p>

                <ul class="mt-6 lg:mt-10 js-show-more-less-items">
                    @foreach ($freeResources->whereIn('type', [Resource::VIDEO_TYPE, Resource::COURSE_TYPE])->where('is_bonus', true) as $resource)
                        @include('partials.resource-on-module-page-with-border')
                    @endforeach
                </ul>
            </div>

            <button class="block py-4 px-8 w-full text-left border-t-2 border-gray-300 font-semibold text-persian-green hidden js-show-more-less-button">
                View more
            </button>
        </div>
    @endif --}}
</div>
