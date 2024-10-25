@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
	<x-hero>
		<h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('New Resources') }}</h1>
	</x-hero>

	<x-panel>
		<div class="grid gap-2 underline">
			@foreach ($resources as $resource)
			<a href="{{ $resource['url'] }}">{{ $resource['name'] }}</a>
			@endforeach
		</div>
	</x-panel>
</div>
@endsection
