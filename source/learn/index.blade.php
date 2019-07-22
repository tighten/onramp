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
                <li>HTML: <a target="_blank" class="hover:underline text-indigo-900" href="https://htmlreference.io/">HTML Reference</a></li>
                <li>CSS: <a target="_blank" class="hover:underline text-indigo-900" href="https://cssreference.io/">CSS Reference</a></li>
                <li>Git: <a target="_blank" class="hover:underline text-indigo-900" href="https://www.git-tower.com/learn/">Git Tower eBook & Video</a></li>
                <li>Local PHP Environment
                    <ul class="list-disc ml-8">
                        <li>Valet: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/valet">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/10">Laracasts Video</a></li>
                    </ul>
                </li>
                <li>Beginning PHP: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners">Laracasts Video Series</a><br>
                    <ul class="list-disc ml-8">
                        <li>Variables</li>
                        <li>Classes</li>
                        <li>Constructors</li>
                        <li>Arrays</li>
                        <li>Basic inheritance</li>
                        <li>Functions</li>
                    </ul>
                </li>
                <li>OOP: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/object-oriented-bootcamp-in-php">Laracasts Video</a></li>
                <li>Creating and serving a new Laravel project <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/installation">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/2">Laracasts Video</a><br>
                    <ul class="list-disc ml-8">
                        <li>Composer: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/6">Laracasts Video</a></li>
                        <li>Artisan</li>
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
                <li>JavaScript: <a target="_blank" class="hover:underline text-indigo-900" href="https://javascript30.com/">Wes Bos Video</a></li>
                <li>Mix</li>
                <li>Basic session-backed internal APIs</li>
            </ul>

            <p>That's all, for now. Soon: links to places to learn each of these techs, and then later maybe exercises to test them and prove out your learning.</p>
        </div>
    </div>
</div>
@endsection
