<li class="inline-flex w-full mt-8 first:mt-0">
    @auth
        @if (Auth::user()->hasTrack() && Auth::user()->track->modules->contains($module->id))
        <completed-checkbox
            class="mr-3 md:mt-1"
            :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
            type="{{ $resource->getMorphClass() }}"
            id="{{ $resource->id }}"
        ></completed-checkbox>
        @endif
    @endauth

    <a class="text-comet" href="{{ $resource->url }}" target="_blank">{{ $resource->name }}</a>
</li>
