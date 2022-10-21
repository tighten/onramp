<a class="block mx-1 border-t border-silver xl:border-none text-body font-bold transition-colors py-4 xl:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'modules.index' ? 'xl:border-2 xl:border-mint xl:rounded-3xl' : '' }}"
    href="{{ route_wlocale('modules.index') }}">
    <span>{{ __('Learn') }}</span>
</a>

<a class="block mx-1 border-t border-silver xl:border-none text-body font-bold transition-colors py-4 xl:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'glossary' ? 'xl:border-2 xl:border-mint xl:rounded-3xl' : '' }}"
    href="{{ route_wlocale('glossary') }}">
    <span>{{ __('Glossary') }}</span>
</a>

<a class="block mx-1 border-t border-silver xl:border-none text-body font-bold transition-colors py-4 xl:py-1 duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3
	{{ Route::currentRouteName() === 'tracks' ? 'xl:border-2 xl:border-mint xl:rounded-3xl' : '' }}"
    href="{{ route_wlocale('tracks') }}">
    <span>{{ __('Tracks') }}</span>
</a>
