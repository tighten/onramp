<div class="flex w-full">
    <a class="flex-1 inline-block w-1/2 px-4 py-1 mx-2 text-lg font-semibold text-center transition duration-150 ease-in-out bg-transparent border-2 hover:no-underline rounded-3xl text-mint border-mint hover:bg-mint hover:text-blue-black"
        href="{{ route_wlocale('login') }}">
        <span>{{ __('Log in') }}</span>
    </a>

    @if (Route::has('register'))
        <a class="flex-1 inline-block w-1/2 px-4 py-1 mx-2 text-lg font-semibold text-center transition duration-150 ease-in-out border-2 under rounded-3xl border-mint bg-mint hover:no-underline hover:bg-transparent hover:text-mint"
            href="{{ route_wlocale('register') }}">
            <span>{{ __('Register') }}</span>
        </a>
    @endif
</div>
