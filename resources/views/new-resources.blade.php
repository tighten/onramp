@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
	<x-hero>
		<h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('New Resources') }}</h1>
	</x-hero>

	<x-panel>
		@if ($resources->count())
		<ul class="grid gap-4">
			@foreach ($resources as $resource)
			<li class="flex gap-2">
				<a href="{{ $resource['url'] }}" class="font-semibold underline">
					{{ $resource['name'] }}
				</a>
				<span>-</span>
				<p> Modules:
					@forelse ($resource['modules'] as $module)
					{{ $module['name'] }}@if (!$loop->last), @endif
					@empty
					No Modules
					@endforelse
				</p>
			</li>
			@endforeach
		</ul>
		@else
		<p class="text-center">There are no new resources.</p>
		@endif
	</x-panel>
</div>
@endsection
