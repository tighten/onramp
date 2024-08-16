@extends('layouts.app')

@php
$localePreferenceKey = 'locale';
$resourceLanguagePreferenceKey = 'resource-language';
@endphp

@section('content')
<div class="w-full">
	<x-hero>
		<h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('New Resources') }}</h1>
	</x-hero>

	<x-panel>

	</x-panel>
</div>
@endsection
