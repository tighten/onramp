@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 mb-8">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">

                @if (session('status'))
                    <div class="px-3 py-4 mb-4 text-sm text-green-700 bg-green-100 border border-t-8 border-green-600 rounded" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                        {{ __('Reset Password') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route_wlocale('password.email') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <p class="mt-2 text-xs italic text-red-500">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="px-4 py-2 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <p class="w-full mt-8 -mb-4 text-xs text-center text-grey-dark">
                                <a class="text-blue-500 no-underline hover:text-blue-700" href="{{ route_wlocale('login') }}">
                                    {{ __("Back to login") }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
