@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">{{ __('Onramp Planning Chat') }}</h1>
    </div>

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6 md:px-0">
        <div class="w-full md:pr-12 mb-6 mt-8 text-black text-lg md:text-xl">
            <p class="mb-8">The planning and development of Onramp happens primarily on GitHub and in a Discord chat. If you're reaching this page, you're likely already in the chat, so here are a few notes you might want to know about the chat and the planning of the project.</p>
            <ul class="list-disc pl-8">
                <li class="mb-4"><strong>Development and streaming</strong>
                    <ul class="list-disc pl-8">
                        <li>Much of the development of the app happens on Matt Stauffer's <a href="https://mattstauffer.com/stream">programming live streams</a>.</li>
                        <li>Announcements are made in Eastern time; the most common time you'll see referenced is 11am eastern, which you can compare to your time zone <a href="https://time.is/compare/1100_4_Oct_2019_in_ET/">here</a>.</li>
                        <li>If you're new to open source, check out our <a href="https://github.com/tightenco/onramp/blob/master/contributing.md">contributing.md</a> to learn more about contributing.</li>
                    </ul>
                </li>
                <li class="mb-4"><strong>Chat guidelines</strong>
                    <ul class="list-disc pl-8">
                        <li>Be kind to each other.</li>
                        <li>Follow the <a href="https://github.com/tightenco/onramp/blob/master/CODE_OF_CONDUCT.md">Code of Conduct</a>.</li>
                        <li>This chat is for planning Onramp. Off-topic conversations are allowed within reason, but try to keep the focus mainly on planning Onramp.</li>
                        <li>Coding questions are fine in this chat if they relate to your work on Onramp, but this isn't an intro-to-Laravel forum; try the <a href="https://discord.gg/mPZNm7A">Laravel Discord</a> for that.</li>
                        <li>We're talking a lot about our learning process in this chat, and we have a diversity of backgrounds (and hopefully we'll grow in diversity). It's easy to see someone ask a question and assume you know more than them and, even in your attempt to help, suffocate them with help and advice. <strong>Assume every person in this chat knows things you don't</strong> and avoid developing a patronizing attitude toward anyone&mdash;even if it's out of kindness!</li>
                        <li>Remember that, at the end of the day, we're just trying to help people. Don't burn yourself out, don't get stressed&mdash;have fun!</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
