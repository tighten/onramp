@extends('layouts.app')

@section('content')
    <div class="text-white">
        @include('partials.welcome-page.welcome-hero')

        @include('partials.welcome-page.overview')

        @include('partials.welcome-page.cta')
    </div>
@endsection
