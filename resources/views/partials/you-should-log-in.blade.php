@if ($checkboxesWork = false)
@guest
    <div class="text-center text-xs text-white px-6 py-2 bg-gray-600 border-b">
        <p class="text-gray-dark">
            Do you want to track your progress through these learning resources? <a href="{{ route_wlocale('register') }}" class="text-white font-bold">Register</a> or <a href="{{ route_wlocale('login') }}" class="text-white font-bold">log in </a> so you can track your progress.
        </p>
    </div>
@endguest
@endif
