@if ($checkboxesWork = true)
    @guest
        <div class="pt-12 pb-2 text-xs text-center border-b text-silver border-silver">
            <p class="text-gray-dark">
                {{ __('Do you want to track your progress through these learning resources?') }} <a href="{{ route_wlocale('login') }}" class="font-bold text-white">{{ __('Register') }}</a> {{ __('or') }} <a href="{{ route_wlocale('login') }}" class="font-bold text-white">{{ __('log in') }} </a> {{ __('so you can track your progress.') }}
            </p>
        </div>
    @endguest
@endif
