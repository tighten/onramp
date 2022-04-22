<div x-data="{ open: false }" @click.away="open = false" class="relative ml-8">
    <button class="flex items-center justify-center w-12 h-12 hover:no-underline focus:outline-none" x-on:click="open = ! open">
        <img class="rounded-full"
            src="{{ auth()->user()->profile_picture }}"
            alt="{{ auth()->user()->name }}">
    </button>

    <div x-show="open" x-cloak class="absolute right-0 z-50 mt-2 origin-top-right rounded-md shadow-lg w-36"
        x-transition:enter="transition-all ease-in duration-200 origin-top"
        x-transition:enter-start="opacity-0 transform scale-y-0"
        x-transition:enter-end="opacity-100 transform scale-y-100"
        x-transition:leave="transition-all ease-out duration-200 origin-top"
        x-transition:leave-start="opacity-100 transform scale-y-100"
        x-transition:leave-end="opacity-0 transform scale-y-0"
    >
        <div class="overflow-hidden bg-white rounded-md shadow-xs">
            <a href="{{ route_wlocale('user.profile.show') }}" class="block px-4 py-3 text-sm font-medium leading-5 transition-colors duration-75 ease-in-out cursor-pointer hover:no-underline hover:bg-silver focus:outline-none focus:bg-silver">
                {{ __('Profile') }}
            </a>

            <a thref="{{ route_wlocale('user.preferences.index') }}" class="block px-4 py-3 text-sm font-medium leading-5 transition-colors duration-75 ease-in-out cursor-pointer hover:no-underline hover:bg-silver focus:outline-none focus:bg-silver">
                {{ __('Preferences') }}
            </a>

            <a href="{{ route_wlocale('logout') }}"
            class="block px-4 py-3 text-sm font-medium leading-5 transition-colors duration-75 ease-in-out cursor-pointer hover:no-underline hover:bg-silver focus:outline-none focus:bg-silver"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>{{ __('Log out') }}</span>
            </a>
        </div>
    </div>
</div>
