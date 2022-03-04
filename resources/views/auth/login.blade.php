@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center py-12 bg-off-white sm:px-6 lg:px-8 bg-blue-black">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{ route_wlocale('welcome') }}">
                <img class="w-auto h-20 mx-auto"
                    src="/images/logo/onramp-mark.svg"
                    alt="Onramp" />
            </a>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form method="POST"
                    action="{{ route_wlocale('login') }}">
                    @csrf
                    <h2 class="mb-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                        {{ __('Log in') }}
                    </h2>

                    <div>
                        <label for="email"
                            class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('Email address') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="block w-full px-3 py-2 placeholder-gray-400 transition duration-200 ease-in-out border border-silver rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-purple sm:text-sm sm:leading-5{{ $errors->has('email') ? ' border-red-500' : '' }}" />
                        </div>

                        @error('email')
                            <p class="mt-2 text-xs italic text-red-500">{{ $errors->first('email') }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password"
                            class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('Password') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password"
                                name="password"
                                type="password"
                                required
                                class="block w-full px-3 py-2 placeholder-gray-400 transition duration-200 ease-in-out border border-silver rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-purple sm:text-sm sm:leading-5{{ $errors->has('password') ? ' border-red-500' : '' }}" />
                        </div>

                        @error('password')
                            <p class="mt-2 text-xs italic text-red-500">{{ $errors->first('password') }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input id="remember"
                                name="remember"
                                type="checkbox"
                                {{ old('remember') ? 'checked' : '' }}
                                class="w-4 h-4 transition duration-200 ease-in-out text-mint form-checkbox" />

                            <label for="remember"
                                class="block ml-2 text-sm leading-5 text-gray-900">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route_wlocale('password.request') }}"
                                class="font-medium transition duration-200 ease-in-out text-purple hover:text-violet focus:outline-none focus:underline">
                                {{ __('Forgot your Password?') }}
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple">
                                {{ __('Log in') }}
                            </button>
                        </span>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-silver"></div>
                        </div>

                        <div class="relative flex justify-center text-sm leading-5">
                            <span class="px-2 text-gray-700 bg-white">{{ __('Don\'t have an account?') }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route_wlocale('register') }}"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple">
                            {{ __('Register') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
