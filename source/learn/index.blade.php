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
                <li>Basic Terminal Commands: <a target="_blank" class="hover:underline text-indigo-900" href="https://blog.teamtreehouse.com/introduction-to-the-mac-os-x-command-line">Treehouse Article</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://www.codecademy.com/courses/learn-the-command-line/lessons/navigation/exercises/your-first-command?action=resume_content_item">Codecademy Course</a></li>
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
                        <li>Variables: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners/episodes/3">Laracasts Video</a></li>
                        <li>Arrays: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners/episodes/6">Laracasts Video</a></li>
                        <li>Functions: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners/episodes/10">Laracasts Video</a></li>
                        <li>Classes: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners/episodes/12">Laracasts Video</a></li>
                        <li>Constructors</li>
                        <li>Basic inheritance</li>
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
                <li>Laravel: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018">Laracasts Video</a>
                    <ul>
                        <li>Laravel Routing &amp; HTTP Verbs (using route closures): <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/routing">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/3">Laracasts Video</a></li>
                        <li>Blade Syntax and inheritance: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/blade">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/4">Laracasts Video</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/5">Laracasts Video</a></li>
                        <li>Relational Databases: <a target="_blank" class="hover:underline text-indigo-900" href="https://serversforhackers.com/s/up-and-running-with-mysql">Servers for Hackers Video</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://www.khanacademy.org/computing/computer-programming/sql">Khan Academy Article</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://www.w3schools.com/sql/exercise.asp?filename=exercise_select1">W3 Schools Exercise</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/php-for-beginners/episodes/11">Laracasts Video</a></li>
                        <li>Basic migrations: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/migrations">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/7">Laracasts Video</a></li>
                        <li>Basic Eloquent syntax: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/eloquent">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/8">Laracasts Video</a></li>
                        <li>CSRF: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/csrf">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/laravel-from-scratch-2018/episodes/10">Laracasts Video</a></li>
                        <li>Validation: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/validation">Laravel Docs</a></li>
                        <li>Sending mail: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/mail">Laravel Docs</a>, <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/notifications">Laravel Docs</a></li>
                        <li>Service Container: <a target="_blank" class="hover:underline text-indigo-900" href="https://laravel.com/docs/5.8/container">Laravel Docs</a></li>
                    </ul>
                </li>
                <li>JavaScript: <a target="_blank" class="hover:underline text-indigo-900" href="https://javascript30.com/">Wes Bos Video</a></li>
                <li>Mix: <a target="_blank" class="hover:underline text-indigo-900" href="https://laracasts.com/series/learn-laravel-mix">Laracasts Video</a></li>
                <li>Basic session-backed internal APIs</li>
                <li>Deployments</li>
                <li>Monitoring (e.g. Bugsnag)</li>
            </ul>

            <p>That's all, for now. Soon: links to places to learn each of these techs, and then later maybe exercises to test them and prove out your learning.</p>
        </div>
    </div>
</div>
@endsection
