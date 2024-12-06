<x-mail::message>
# Here are the latest resources:

<x-mail::panel>
@foreach ($resources as $resource)
- [{{ $resource['name'] }}]({{ $resource['url'] }}) <br />
Added on {{ \Carbon\Carbon::parse($resource['created_at'])->format('F j, Y') }}

@endforeach
</x-mail::panel>

### Happy Coding!

### Your friends at Tighten


<x-mail::subcopy>
You are receiving this email because you subscribed at [{{ config('app.name') }}]({{ config('app.url') }}).<br />
[Unsubscribe]({{ $unsubscribeUrl }})
</x-mail::subcopy>

</x-mail::message>
