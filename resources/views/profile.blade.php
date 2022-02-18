@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
    <x-hero>
        <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('My Profile') }}</h1>
    </x-hero>

    <div class="pb-48 -mt-px fluid-container lg:pt-8">
        <form method="post" action="{{ route_wlocale('user.profile.update') }}">
            @method('PUT')
            @csrf

            <x-form.heading>{{ __('Account Settings') }}</x-form.heading>

            <x-form.picture>
                <div class="flex-auto w-full my-5 text-base lg:flex-even md:mt-8 md:mb-4">{{ __('Profile') }}</div>
                <div class="flex flex-wrap justify-center w-full pb-2 text-base sm:justify-start">
                    <div class="md:flex-shrink-0">
                        <img class="w-48 p-3 mx-auto rounded-full md:ml-3" src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }}">
                        <p class="self-center py-2 text-sm font-normal">{{ __('Your current public profile picture is sourced from Gravatar.') }} <a href="http://gravatar.com" class="py-2 underline">{{ __('Change') }}</a></p>
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
