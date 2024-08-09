@component('mail::message')
# Here are the latest resources:

@component('mail::panel')
@foreach ($resources as $resource)
- [{{ $resource['name'] }}]({{ $resource['url'] }})<br>
Added on {{ \Carbon\Carbon::parse($resource['created_at'])->format('F j, Y') }}<br><br>
@endforeach
@endcomponent

### Happy Coding!

### Your friends at {{ config('app.name') }}

<p>If you no longer wish to receive these emails, you can <a href="{{ route('unsubscribe') }}">unsubscribe here</a>.</p>
@endcomponent
