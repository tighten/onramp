<a class="block mx-1 border-t border-silver lg:border-none text-body font-bold transition-colors py-4 lg:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'modules.index' ? 'lg:border-2 lg:border-mint lg:rounded-3xl' : '' }}"
    href="{{ route_wlocale('modules.index') }}">
    <span>{{ __('Learn') }}</span>
</a>

<a class="block mx-1 border-t border-silver lg:border-none text-body font-bold transition-colors py-4 lg:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'glossary' ? 'lg:border-2 lg:border-mint lg:rounded-3xl' : '' }}"
    href="{{ route_wlocale('glossary') }}">
    <span>{{ __('Glossary') }}</span>
</a>

<a class="block mx-1 border-t border-silver lg:border-none text-body font-bold transition-colors py-4 lg:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'tracks' ? 'lg:border-2 lg:border-mint lg:rounded-3xl' : '' }}"
    href="{{ route_wlocale('tracks') }}">
    <span>{{ __('Tracks') }}</span>
</a>
