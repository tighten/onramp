<nav class="flex items-center">
	<a class="block mx-1 text-body font-semibold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
		{{ Route::currentRouteName() === 'modules.index' ? 'border-2 border-mint rounded-3xl' : '' }}"
		href="{{ route_wlocale('modules.index') }}">
		<span>{{ __('Learn') }}</span>
	</a>

	<a class="block mx-1 text-body font-bold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
		{{ Route::currentRouteName() === 'glossary' ? 'border-2 border-mint rounded-3xl' : '' }}"
		href="{{ route_wlocale('glossary') }}">
		<span>{{ __('Glossary') }}</span>
	</a>
	<a class="block mx-1 text-body font-bold transition-colors duration-300 ease-in-out text-mint hover:text-white hover:no-underline px-3 py-1
		{{ Route::currentRouteName() === 'tracks' ? 'border-2 border-mint rounded-3xl' : '' }}"
		href="{{ route_wlocale('tracks') }}">
		<span>{{ __('Tracks') }}</span>
	</a>
</nav>
