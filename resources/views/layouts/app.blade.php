{{-- Template from https://templates.digizu.co.uk/ --}}
<!DOCTYPE html>
@php
$fullPageTitle = (isset($pageTitle) ? "{$pageTitle} | " : '') . __('Onramp to Laravel');
@endphp
<html lang="{{ locale() }}" class="scroll-padding-header" style="scroll-behavior:smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $fullPageTitle }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? url('/images/opengraph-logo-dark.png') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="twitter:title" content="{{ $fullPageTitle }}">
    <meta property="twitter:description" content="{{ $ogDescription ?? __('Learn everything you need to get hired writing Laravel, quickly and easily.') }}">
    <meta property="twitter:image" content="{{ $ogImage ?? url('/images/opengraph-logo-dark.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss'])

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    @stack('styles')

    <script>
        window.locale = "{{ app()->getLocale() }}";
        window.fallback_locale = "{{ config('app.fallback_locale') }}";
        window.locales = {!! json_encode(Localization::all()) !!};
        window.language = '{{ Localization::languageForLocale(locale()) }}';

        function chooseLanguage(value) {
            axios
                .patch(route("user.preferences.update", {
                    locale: "en"
                }), {
                    locale: value
                })
                .then(() => {
                    let segments = window.location.pathname.split("/");
                    segments[1] = value;
                    window.location = `${
                        window.location.origin
                    }${segments.join("/")}`;
                })
                .catch(error => {
                    alert("Error!");
                    console.log(error);
                });
        }

        const isInViewport = (element) => {
            const rect = element.getBoundingClientRect();
            const offset = (rect.bottom - rect.top) / 2;

            return (
                (rect.top === 0 || Math.abs(rect.top + offset) <= rect.bottom) &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        window.addEventListener("scroll", () => {
            const heroBanner = window.document.querySelector('#top');
            const topButton = window.document.querySelector('#top-button');

            if (heroBanner) {
                isInViewport(heroBanner)
                    ? topButton.classList.add("invisible")
                    : topButton.classList.remove("invisible");
            }
        });
    </script>

    <title>{{ $fullPageTitle }}</title>
</head>

<body class="bg-blue-black">
    <div id="app" class="mx-auto sm:container">
        <header class="fixed top-0 left-0 w-full z-[9999]">
            @include('partials.navigation.header.main-header')
        </header>
        <div id="app-body">
            @includeWhen(! request()->routeIs('wizard.index'), 'partials.choose-track')
            @yield('content')
           
            @include('partials.navigation.back-to-top')

            <!-- toast notifications -->
            @if (session('toast'))
            <toast message="{{ session('toast') }}"></toast>
            @endif
        </div>
        @include('partials.navigation.footer')
    </div>
    @routes
    @vite(['resources/js/app.js', 'resources/js/scripts.js'])
</body>

</html>
