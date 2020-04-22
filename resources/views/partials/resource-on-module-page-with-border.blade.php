<li class="inline-flex mt-6 pt-8 pr-5 pl-6 border-t-2 w-full first:mt-0 first:pt-0 first:border-0 lg:px-12">
    @auth
    <completed-checkbox
        class="mr-5"
        :initial-is-completed="{{ $completedResources->contains($resource->id) ? 'true' : 'false' }}"
        type="{{ $resource->getMorphClass() }}"
        id="{{ $resource->id }}"
        ></completed-checkbox>
    @endauth

    <a class="text-comet" href="{{ $resource->url }}">
        {{ $loop->iteration }}. {{ $resource->name }}
    </a>
</li>
