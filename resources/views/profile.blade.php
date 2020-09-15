@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container">
            <h1 class="max-w-lg">{{ __('My Profile') }}</h1>
        </div>
    </div>

    <div class="pb-48 fluid-container lg:pt-8">
        <form method="post" action="{{ route_wlocale('user.profile.update') }}">
            @method('PUT')
            @csrf

            <x-form.heading>{{ __('Account Settings') }}</x-form.heading>

            <x-form.picture>
                <div class="flex-auto w-full my-5 lg:flex-even md:mt-8 md:mb-4 text-base">Profile</div>
                <div class="flex flex-wrap w-full pb-2 text-base justify-center sm:justify-start">
                    <div class="md:flex-shrink-0">
                        <img class="p-3 mx-auto rounded-full w-48" src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }}">
                    </div>
                    <div class="mt-4 sm:ml-6 sm:my-0 md:mt-0 md:ml-12 self-center">
                        <a href="http://gravatar.com" class="py-2 self-center lg:text-lg button button-white border border-gray-300 font-normal">Update Profile Picture</a>
                    </div>
                </div>
            </x-form.picture>

            <x-form.section>
                <x-input.text
                    name="name"
                    :label="__('Name')"
                    :value="auth()->user()->name"
                ></x-input.text>

                <x-input.text
                    name="email"
                    :label="__('Email')"
                    :value="auth()->user()->email"
                    type="email"
                ></x-input.text>
            </x-form.section>

            <div class="pt-5 mt-8">
                <div class="flex justify-start">
                    <x-button.primary>
                        {{ ucfirst(__('save')) }}
                    </x-button.primary>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
