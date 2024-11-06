@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
	<x-hero>
		<h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('New Resources') }}</h1>
	</x-hero>

	<x-panel>
		@if ($resources->count())
		<ul class="grid gap-2">
			@foreach ($resources as $resource)
			<li>
				<a href="{{ $resource['url'] }}" class="underline">
					{{ $resource['name'] }}
				</a>
			</li>
			@endforeach
		</ul>
		@else
		<p class="text-center">There are no new resources.</p>
		@endif
	</x-panel>
</div>
@endsection
