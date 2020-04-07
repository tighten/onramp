<li class="inline-flex mt-8 w-full first:mt-0">
    @auth
    <completed-checkbox
        class="mr-5"
        :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
        type="{{ $resource->getMorphClass() }}"
        id="{{ $resource->id }}"
        ></completed-checkbox>
    @endauth

    <a class="text-comet" href="{{ $resource->url }}">{{ $resource->name }}</a>
</li>
