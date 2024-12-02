<x-mail::message>
# Here are the latest resources:

<x-mail::panel>
@foreach ($resources as $resource)
- [{{ $resource['name'] }}]({{ $resource['url'] }}) <br />
Added on {{ \Carbon\Carbon::parse($resource['created_at'])->format('F j, Y') }}

@endforeach
</x-mail::panel>

### Happy Coding!

### Your friends at {{ config('app.name') }}

<x-mail::button :url="$unsubscribeUrl">
Unsubscribe
</x-mail::button>
</x-mail::message>
