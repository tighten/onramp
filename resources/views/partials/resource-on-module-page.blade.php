<li>
    <input type="checkbox" value="on"{{ $completedResources->contains($resource->id) ? ' checked="checked"' : '' }}>
    <a href="{{ $resource->url }}">{{ $resource->name }}</a>
</li>
