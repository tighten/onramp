<li>
    @auth
    <completed-checkbox
        :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
        type="{{ $resource->getMorphClass() }}"
        id="{{ $resource->id }}"
        ></completed-checkbox>
    @endauth

    <a href="{{ $resource->url }}">{{ $resource->name }}</a>
</li>
