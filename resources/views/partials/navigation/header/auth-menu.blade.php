<menu-dropdown>
	<template v-slot:toggle="props">
		<button
			class="flex items-center justify-center w-12 h-12 hover:no-underline focus:outline-none"
			@click="props.toggle">
			<img class="rounded-full"
				src="{{ auth()->user()->profile_picture }}"
				alt="{{ auth()->user()->name }}">
		</button>
	</template>

	<menu-dropdown-item text="{{ __('Profile') }}"
		href="{{ route_wlocale('user.profile.show') }}">
	</menu-dropdown-item>

	<menu-dropdown-item text="{{ __('Preferences') }}"
		href="{{ route_wlocale('user.preferences.index') }}">
	</menu-dropdown-item>

	<menu-dropdown-item text="{{ __('Log out') }}"
		href="{{ route_wlocale('logout') }}"
		:logout="true">
	</menu-dropdown-item>
</menu-dropdown>
