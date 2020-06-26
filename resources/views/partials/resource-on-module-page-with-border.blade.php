<li class="inline-flex w-full pt-8 pl-6 pr-5 mt-6 border-t-2 first:mt-0 first:pt-0 first:border-0 lg:px-12">
    @auth
        @if (Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id))
            <completed-checkbox
                class="mr-5"
                :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
                type="{{ $resource->getMorphClass() }}"
                id="{{ $resource->id }}"
            ></completed-checkbox>
        @endif
    @endauth

    <a class="text-comet" href="{{ $resource->url }}" target="_blank">
        {{ $loop->iteration }}. {{ $resource->name }}
    </a>
</li>
