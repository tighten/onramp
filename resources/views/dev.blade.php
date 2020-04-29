@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container">
            <h1 class="max-w-lg mx-auto text-center">{{ __('Under Construction') }}</h1>
        </div>
    </div>

    <div class="pt-12 pb-48 lg:pt-20 fluid-container">
        <div class="w-full max-w-screen-md mx-auto">
            <p class="mb-4 font-semibold leading-normal text-gray-700 md:mb-10">
                This site is currently being built. You may notice it changing as you use it, or feeling incomplete&mdash;don't worry!
            </p>

            <p class="mb-4 leading-normal text-gray-700 md:mb-10">Here's the plan: we're working to make the list of tracks and modules a bit more concrete, so you can continue to track your progress through them and, hopefully soon, take little mini self-quizzes to help ensure you've learned the tech well.</p>

            <p class="mb-4 leading-normal text-gray-700 md:mb-10">If you've joined because you have <em>experience</em> teaching programming (or you've learned yourself recently and want to share how you learned), please reach out so you can join the project! You can email me at <a class="text-blue-700"href="mailto:matt@tighten.co">matt@tighten.co</a>.</p>

            <p class="mb-4 leading-normal text-gray-700 md:mb-10">You can also <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp">view its source</a>, <a class="text-blue-700 hover:underline" href="https://discord.gg/NQQcjCZ">join a chat of people talking about how best to build it</a>, watch <a class="text-blue-700 hover:underline" href="https://www.youtube.com/playlist?list=PLgJIx0-UaB9TtEjorHmkp71C_becHkpJO">old live streams</a> or <a class="text-blue-700 hover:underline" href="https://mattstauffer.com/stream">follow along with new live streams</a> of it being built, or <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp/blob/master/contributing.md">contribute to it yourself</a>.</p>
        </div>
    </div>
</div>
@endsection
