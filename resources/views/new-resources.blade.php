@extends('layouts.app')

@section('content')
<div class="w-full">
	<x-hero>
		<h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('New Resources') }}</h1>
	</x-hero>

	<x-panel>
		<ul class="grid gap-y-4 xl:grid-cols-2">
			@foreach ($resources as $resource)
			<li class="hover:undeline">
				<a href="{{ $resource['url'] }}">
					<span>{{ $resource['name'] }}</span>
					<span>{{ $resource['module'] }}</span>
					<span>{{ $resource['track'] }}</span>
					<span class="text-sm text-gray"> - Added on {{ \Carbon\Carbon::parse($resource['created_at'])->format('F j, Y') }}</span>
				</a>
			</li>
			@endforeach
		</ul>
	</x-panel>
</div>
@endsection
