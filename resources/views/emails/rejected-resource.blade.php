@component('mail::message')
Hello {{ $user->name }},

The resource you suggested on [Onramp]({{ route('welcome', ['locale' => 'en']) }}) has been rejected by one of our reviewers:

@component('mail::panel')
{{ $resource->name }}<br>
[Resource URL]({{ $resource->url }})
###### *Submitted on {{ $resource->created_at->format('d-m-Y') }}*

**{{ $resource->rejected_reason }}**
@endcomponent

We thank you for your contribution and encourage you to submit new resources that may be useful to the community.

@endcomponent
