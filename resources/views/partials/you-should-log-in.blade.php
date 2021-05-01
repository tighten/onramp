@if ($checkboxesWork = true)
@guest
    <div class="px-6 py-2 text-xs text-center text-white bg-gray-600 border-b">
        <p class="text-gray-dark">
            {{ __('Do you want to track your progress through these learning resources?') }} <a href="{{ route_wlocale('register') }}" class="font-bold text-white">{{ __('Register') }}</a> {{ __('or') }} <a href="{{ route_wlocale('login') }}" class="font-bold text-white">{{ __('log in') }} </a> {{ __('so you can track your progress.') }}
        </p>
    </div>
@endguest
@endif
