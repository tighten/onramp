@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class="text-xl md:text-4xl pb-4">{{ __('Under Construction') }}</h1>
    </div>

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-12">
            <h2 class="mb-6 mt-8 text-black text-xl md:text-2xl">
                <p class="mb-4">This site is currently being built. You may notice it changing as you use it, or feeling incomplete&mdash;don't worry!</p>
                <p>You can <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp">view its source</a>, <a class="text-blue-700 hover:underline" href="https://discord.gg/NQQcjCZ">join a chat of people talking about how best to build it</a>, watch <a class="text-blue-700 hover:underline" href="https://www.youtube.com/playlist?list=PLgJIx0-UaB9TtEjorHmkp71C_becHkpJO">old live streams</a> or <a class="text-blue-700 hover:underline" href="https://mattstauffer.com/stream">follow along with new live streams</a> of it being built, or <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp/blob/master/contributing.md">contribute to it yourself</a>.
            </h2>
        </div>
    </div>
</div>
@endsection
