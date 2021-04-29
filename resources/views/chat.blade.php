@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container">
            <h1 class="max-w-xl mx-auto text-center">{{ __('Onramp Planning Chat') }}</h1>
        </div>
    </div>

    <div class="pt-12 pb-48 lg:pt-20 fluid-container">
        <div class="w-full max-w-screen-md mx-auto mb-6 text-base lg:text-lg">
            <p class="leading-normal text-gray-700">
                The planning and development of Onramp happens primarily on GitHub and in a Discord chat. If you're reaching this page, you're likely already in the chat, so here are a few notes you might want to know about the chat and the planning of the project.
            </p>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Development and streaming</h2>

            <ul class="list-disc">
                <li class="mb-3 md:mb-4">Much of the development of the app happens on Matt Stauffer's <a href="https://mattstauffer.com/stream">programming live streams</a>.</li>
                <li class="mb-3 md:mb-4">Announcements are made in Eastern time; the most common time you'll see referenced is 11am eastern, which you can compare to your time zone <a href="https://time.is/compare/1100_4_Oct_2019_in_ET/">here</a>.</li>
                <li class="mb-3 md:mb-4">If you're new to open source, check out our <a href="https://github.com/tighten/onramp/blob/main/contributing.md">contributing.md</a> to learn more about contributing.</li>
            </ul>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Chat guidelines</h2>

            <ul class="list-disc">
                <li class="mb-3 md:mb-4">Be kind to each other.</li>
                <li class="mb-3 md:mb-4">Follow the <a href="https://github.com/tighten/onramp/blob/main/code_of_conduct.md">Code of Conduct</a>.</li>
                <li class="mb-3 md:mb-4">This chat is for planning Onramp. Off-topic conversations are allowed within reason, but try to keep the focus mainly on planning Onramp.</li>
                <li class="mb-3 md:mb-4">Coding questions are fine in this chat if they relate to your work on Onramp, but this isn't an intro-to-Laravel forum; try the <a href="https://discord.gg/mPZNm7A">Laravel Discord</a> for that.</li>
                <li class="mb-3 md:mb-4">We're talking a lot about our learning process in this chat, and we have a diversity of backgrounds (and hopefully we'll grow in diversity). It's easy to see someone ask a question and assume you know more than them and, even in your attempt to help, suffocate them with help and advice. <strong>Assume every person in this chat knows things you don't</strong> and avoid developing a patronizing attitude toward anyone&mdash;even if it's out of kindness!</li>
                <li class="mb-3 md:mb-4">Remember that, at the end of the day, we're just trying to help people. Don't burn syourself out, don't get stressed&mdash;have fun!</li>
            </ul>
        </div>
    </div>
</div>
@endsection
