@component('mail::message')
# Here are the latest resources:

@component('mail::panel')
@foreach ($resources as $resource)
- [{{ $resource['name'] }}]({{ $resource['url'] }})
Added on {{ \Carbon\Carbon::parse($resource['created_at'])->format('F j, Y') }}

@endforeach
@endcomponent

### Happy Coding!

### Your friends at {{ config('app.name') }}

<x-mail::button :url="$unsubscribeUrl">
	Unsubscribe
</x-mail::button>
@endcomponent
