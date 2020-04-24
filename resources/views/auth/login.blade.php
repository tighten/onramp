@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 mb-8">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                        {{ __('Log in') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route_wlocale('login') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('E-Mail Address') }}
                            </label>

                            <input
                                id="email"
                                type="email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}"
                                name="email"
                                value="{{ old('email') }}"
                                required autofocus>

                            @if ($errors->has('email'))
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Password') }}
                            </label>

                            <input
                                id="password"
                                type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}"
                                name="password"
                                required>

                            @if ($errors->has('password'))
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex mb-6">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="ml-3 text-sm text-gray-700" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="px-4 py-2 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                {{ __('Log in') }}
                            </button>

                            <a class="ml-auto text-sm text-blue-500 no-underline whitespace-no-wrap hover:text-blue-700" href="{{ route_wlocale('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>

                            <p class="w-full mt-8 -mb-2 text-xs text-center text-gray-700">
                                {{ __("Don't have an account?") }}
                                <a class="text-blue-500 no-underline hover:text-blue-700" href="{{ route_wlocale('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
