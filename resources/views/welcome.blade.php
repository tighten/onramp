@extends('layouts.app')

@section('content')
    <div class="w-full text-white bg-blue-black">
        @include('partials.welcome-page.welcome-hero')

        @include('partials.welcome-page.overview')

        @include('partials.welcome-page.cta')
    </div>
@endsection
