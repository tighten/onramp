<li class="inline-flex w-full mt-8 first:mt-0">
    @auth
        @if (! is_null(Auth::user()->track_id) && Auth::user()->track->modules->contains($module->id))
        <completed-checkbox
            class="mr-5"
            :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
            type="{{ $resource->getMorphClass() }}"
            id="{{ $resource->id }}"
            ></completed-checkbox>
        @endif
    @endauth

    <a class="text-comet" href="{{ $resource->url }}">{{ $resource->name }}</a>
</li>
