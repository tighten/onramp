@extends('_layouts.master')

@section('body')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">Learn Laravel</h1>
        <p class="leading-loose text-gray-dark">
            The outline
        </p>
    </div>
    <!-- /title -->

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-12">
            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">
                Tech you should know, in general order of learning
            </h2>

            <ul class="list-disc">
                <li>Basic Terminal Commands</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
                <li>Git</li>
                <li>OOP</li>
                <li>Bare minimum PHP<br>
                    <ul class="list-disc ml-8">
                        <li>Variables</li>
                        <li>Classes</li>
                        <li>Constructors</li>
                        <li>Arrays</li>
                        <li>Basic inheritance</li>
                        <li>Functions</li>
                    </ul>
                </li>
                <li>Creating and serving a new Laravel project<br>
                    <ul class="list-disc ml-8">
                        <li>Entry level composer</li>
                        <li>Entry level artisan</li>
                        <li>Entry level Valet</li>
                    </ul>
                </li>
                <li>Laravel Routing &amp; HTTP Verbs (using route closures)</li>
                <li>Blade Syntax and inheritance</li>
                <li>Deploying</li>
                <li>Relational Databases</li>
                <li>Basic Eloquent syntax</li>
                <li>Basic migrations</li>
                <li>Sending mail</li>
                <li>CSRF</li>
                <li>Validation</li>
                <li>Artisan</li>
                <li>Type-hinting, DI, the container</li>
                <li>Monitoring (e.g. Bugsnag)</li>
                <li>Mix</li>
                <li>Basic session-backed internal APIs</li>
            </ul>

            <p>That's all, for now. Soon: links to places to learn each of these techs, and then later maybe exercises to test them and prove out your learning.</p>
        </div>
    </div>
</div>
@endsection
