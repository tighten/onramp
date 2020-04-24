<dropdown-trigger class="flex items-center h-9">
    @isset($user->email)
        <img
            src="https://secure.gravatar.com/avatar/{{ md5($user->email) }}?size=512"
            class="w-8 h-8 mr-3 rounded-full"
        />
    @endisset

    <span class="text-90">
        {{ $user->name ?? $user->email ?? __('Nova User') }}
    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        <li>
            <a href="{{ route('nova.logout') }}" class="block p-3 no-underline text-90 hover:bg-30">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</dropdown-menu>
