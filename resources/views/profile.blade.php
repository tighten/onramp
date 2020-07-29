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
