@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center py-12 bg-off-white sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route_wlocale('welcome') }}">
            <img class="w-auto h-20 mx-auto" src="/images/logo/onramp-mark.svg" alt="Onramp" />
        </a>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route_wlocale('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <h2 class="mb-6 text-3xl font-extrabold leading-9 text-center text-steel">
                    {{ __('Reset Password') }}
                </h2>

                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-steel">
                        {{ __('Email address') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="block w-full px-3 py-2 placeholder-gray transition duration-200 ease-in-out border border-silver rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-lake sm:text-sm sm:leading-5{{ $errors->has('email') ? ' border-cabernet' : '' }}" />
                    </div>

                    @error('email')
                    <p class="mt-2 text-xs italic text-cabernet">{{ $errors->first('email') }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-steel">
                        {{ __('Password') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="password" type="password" required class="block w-full px-3 py-2 placeholder-gray transition duration-200 ease-in-out border border-silver rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-lake sm:text-sm sm:leading-5{{ $errors->has('password') ? ' border-cabernet' : '' }}" />
                    </div>

                    @error('password')
                    <p class="mt-2 text-xs italic text-cabernet">{{ $errors->first('password') }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password-confirm" class="block text-sm font-medium leading-5 text-steel">
                        {{ __('Confirm Password') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password-confirm" name="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray transition duration-200 ease-in-out border rounded-md appearance-none border-silver focus:outline-none focus:shadow-outline-blue focus:border-lake sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white no-underline transition duration-200 ease-in-out border border-transparent rounded-md focus:bg-white focus:text-purple bg-purple hover:bg-white hover:text-purple hover:no-underline focus:outline-none border-purple active:bg-white active:text-purple">
                            {{ __('Reset password') }}
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
