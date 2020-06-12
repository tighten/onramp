{{-- Template from https://templates.digizu.co.uk/ --}}<!DOCTYPE html>
@php
$fullPageTitle = (isset($pageTitle) ? "{$pageTitle} | " : '') .  __('Onramp to Laravel');
@endphp
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:title" content="{{ $fullPageTitle }}">
        <meta property="og:type" content="{{ $ogType ?? 'website' }}">
        <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
        <meta property="og:image" content="{{ $ogImage ?? url('/images/opengraph_logo.png') }}">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ $ogUrl ?? url()->current() }}">
        <meta property="twitter:title" content="{{ $fullPageTitle }}">
        <meta property="twitter:description" content="{{ $ogDescription ?? __('Learn everything you need to get hired writing Laravel, quickly and easily.') }}">
        <meta property="twitter:image" content="{{ $ogImage ?? url('/images/twitter_card.png') }}">

        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script>
            window.locale = "{{ app()->getLocale() }}";
            window.fallback_locale = "{{ config('app.fallback_locale') }}";
        </script>

        <title>{{ $fullPageTitle }}</title>
    </head>
    <body>
        <div id="app">
            <!-- header -->
            @include('partials.navigation.header')

            <!-- body -->
            @includeWhen(! request()->routeIs('wizard.index'), 'partials.choose-track')
            @yield('content')
            <!-- /body -->

            <!-- footer -->
            @include('partials.navigation.footer')

            <!-- toast notifications -->
            @if (session('toast'))
                <toast message="{{ session('toast') }}"></toast>
            @endif
        </div>
        @routes
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/scripts.js') }}"></script>
    </body>
</html>
