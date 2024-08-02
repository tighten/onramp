@component('mail::message')
# Here are the latest resources:

@component('mail::panel')
@foreach ($resources as $resource)
- {{ $resource['name'] }}
@endforeach
@endcomponent

### Happy Coding!

### Your friends at {{ config('app.name') }}
@endcomponent
