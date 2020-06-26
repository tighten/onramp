@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">{{ __('My Onramp') }}</h1>
        <p class="leading-loose text-gray-dark">
            Tracking your progress
        </p>
    </div>

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full md:pr-12 mb-6">
            <h2 class="mb-6 mt-8 text-black text-xl md:text-2xl">
                Hi, friend! Thank you for signing up.<br><br>
                There's nothing here... yet :)<br><br>
                Here's the plan: once the list of tracks and modules is a bit more concrete, we're going to make it so you can track your progress through them and, hopefully soon, take little mini self-quizzes to help ensure you've learned the tech well.<br><br>
                If you've joined because you have <em>experience</em> teaching programming (or you've learned yourself recently and want to share how you learned), please reach out so you can join the project! You can email me at <a class="text-blue-700"href="mailto:matt@tighten.co">matt@tighten.co</a>.
            </h2>
        </div>
    </div>
</div>
@endsection
