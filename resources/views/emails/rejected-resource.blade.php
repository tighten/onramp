<x-mail::message>
	Hello {{ $user->name }},

	The resource you suggested on [Onramp]({{ route('welcome', ['locale' => 'en']) }}) has been rejected by one of our reviewers:

	<x-mail::panel>
		{{ $resource->name }}<br>
		[Resource URL]({{ $resource->url }})
		###### *Submitted on {{ $resource->created_at->format('d-m-Y') }}*

		**{{ $resource->rejected_reason }}**
	</x-mail::panel>

	We thank you for your contribution and encourage you to submit new resources that may be useful to the community.
</x-mail::message>
