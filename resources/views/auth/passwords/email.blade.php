@extends('layouts.app-without-nav')

@section('content')
<div class="flex flex-col justify-center min-h-screen py-12 bg-off-white sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route_wlocale('welcome') }}">
            <img class="w-auto h-20 mx-auto" src="/images/logo/onramp-mark.svg" alt="Onramp" />
        </a>
    </div>

    @if (session('status'))
        <div class="p-4 mt-8 bg-green-100 rounded-md sm:mx-auto sm:w-full sm:max-w-md" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>

                <div class="ml-3">
                    <h3 class="text-sm font-semibold leading-5 text-green-900">
                        {{ __('Password reset link sent') }}
                    </h3>

                    <div class="mt-2 text-sm leading-5 text-green-700">
                        <p>{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route_wlocale('password.email') }}">
                @csrf
                <h2 class="mb-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                    {{ __('Reset Password') }}
                </h2>

                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        {{ __('Email address') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5{{ $errors->has('email') ? ' border-red-500' : '' }}"
                        />
                    </div>

                    @error('email')
                        <p class="mt-2 text-xs italic text-red-500">{{ $errors->first('email') }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button
                            type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-700 border border-transparent rounded-md hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700"
                        >
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </span>
                </div>

                <div class="mt-6 text-center">
                    <div class="text-sm leading-5">
                        <a
                            href="{{ route_wlocale('login') }}"
                            class="font-medium text-teal-700 transition duration-150 ease-in-out hover:text-teal-500 focus:outline-none focus:underline"
                        >
                            {{ __('Back to login') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
