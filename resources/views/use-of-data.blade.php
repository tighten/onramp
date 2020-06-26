@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="text-center px-6 py-12 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl">{{ __('Use of Data') }}</h1>
    </div>

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-6">
        <div class="w-full md:pr-12 mb-6">
            <p class="leading-normal text-gray-700">
               The following is meant to describe how we obtain and use information collected from you, which may be considered personal data when maintained in an identifiable manner.
            </p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">Registration</h2>

            <p class="text-gray-700 leading-normal mb-4">
                We collect your first name, last name, email address, and password when you register for an account on Onramp. The email address you provide will be used as your login. We also collect content and information you provide when suggesting a resource to add to Onramp. In this case, your email address may be used to notify you in cases where your suggested resources are declined. We store any preferences you set (e.g. preferred language, operating system) and whether you mark any content as "completed".
            </p>

            <p class="text-gray-700 leading-normal mb-4">Registering for an account is not a requirement for using the site unless you would like to track your progress as you complete modules, resources, and skills.</p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">Cookies</h2>

            <p class="text-gray-700 leading-normal mb-4">Cookies are small data files that we store on your computer or device and access each time you visit the site.</p>

            <p class="text-gray-700 leading-normal mb-1 font-bold">Onramp uses various types of cookies, including:</p>

            <ul class="text-gray-700 leading-normal mb-6 ml-5">
                <li class="mb-2"><em>Session cookies</em>, which disappear when you log out and close your browser; and</li>
                <li class="mb-2"><em>Persistent cookies</em>, which stay on your device until you or your browser deletes them or they expire</li>
            </ul>

            <p class="text-gray-700 leading-normal mb-1 font-bold">We use cookies to recognize you and/or your device(s) for the following:</p>

            <ul class="text-gray-700 leading-normal ml-5">
                <li class="mb-2"><em>Login persistence</em>; if you're signed in to your account, cookies help us keep you logged in and personalize your experience.</li>
                <li class="mb-2"><em>Storing preferences</em>; this allows us to display site content in your preferred language and under your preferred track over a single user-session.</li>
            </ul>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">Securing Data</h2>

            <p class="text-gray-700 leading-normal mb-4">We only ask for personal information when we truly need it to provide certain functions of this site to you. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.</p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">Links</h2>

            <p class="text-gray-700 leading-normal mb-4">Onramp may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">Updates</h2>

            <p class="text-gray-700 leading-normal mb-4">We reserve the right to change the information outlined here at any given time. We encourage you to frequently visit this page to ensure you are up to date with the latest changes.</p>
        </div>
    </div>
</div>
@endsection
