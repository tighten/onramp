<li class="inline-flex items-center w-full mt-8 first:mt-0">
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

    <a class="mr-3 text-comet" href="{{ $resource->url }}" target="_blank">{{ $resource->name }}</a>

    @if($resource->is_new)
        <span class="px-3 py-1 text-sm font-bold text-white rounded-md bg-teal">new<span>
    @endif
</li>
