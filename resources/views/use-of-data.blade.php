@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container">
            <h1 class="max-w-xl mx-auto text-center">{{ __('Use of Data') }}</h1>
        </div>
    </div>

    <div class="pt-12 pb-48 lg:pt-20 fluid-container">
        <div class="w-full max-w-screen-md mx-auto mb-6 text-base lg:text-lg">
            <p class="leading-normal text-gray-700">
               The following is meant to describe how we obtain and use information collected from you, which may be considered personal data when maintained in an identifiable manner.
            </p>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Registration</h2>

            <p class="mb-4 leading-normal text-gray-700">
                We collect your first name, last name, email address, and password when you register for an account on Onramp. The email address you provide will be used as your login. We also collect content and information you provide when suggesting a resource to add to Onramp. In this case, your email address may be used to notify you in cases where your suggested resources are declined. We store any preferences you set (e.g. preferred language, operating system) and whether you mark any content as "completed".
            </p>

            <p class="mb-4 leading-normal text-gray-700">Registering for an account is not a requirement for using the site unless you would like to track your progress as you complete modules, resources, and skills.</p>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Cookies</h2>

            <p class="mb-4 leading-normal text-gray-700">Cookies are small data files that we store on your computer or device and access each time you visit the site.</p>

            <p class="mb-1 font-semibold leading-normal text-gray-700">Onramp uses various types of cookies, including:</p>

            <ul class="mb-6 leading-normal text-gray-700">
                <li class="mb-2">Session cookies, which disappear when you log out and close your browser; and</li>
                <li class="mb-2">Persistent cookies, which stay on your device until you or your browser deletes them or they expire</li>
            </ul>

            <p class="mb-1 font-semibold leading-normal text-gray-700">We use cookies to recognize you and/or your device(s) for the following:</p>

            <ul class="leading-normal text-gray-700">
                <li class="mb-2">Login persistence; if you're signed in to your account, cookies help us keep you logged in and personalize your experience.</li>
                <li class="mb-2">Storing preferences; this allows us to display site content in your preferred language and under your preferred track over a single user-session.</li>
            </ul>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Securing Data</h2>

            <p class="mb-4 leading-normal text-gray-700">We only ask for personal information when we truly need it to provide certain functions of this site to you. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.</p>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Links</h2>

            <p class="mb-4 leading-normal text-gray-700">Onramp may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>

            <h2 class="mt-8 mb-5 text-xl font-semibold lg:mt-12 md:text-2xl">Updates</h2>

            <p class="mb-4 leading-normal text-gray-700">We reserve the right to change the information outlined here at any given time. We encourage you to frequently visit this page to ensure you are up to date with the latest changes.</p>
        </div>
    </div>
</div>
@endsection
