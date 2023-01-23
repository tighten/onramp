<div class="relative w-full overflow-hidden bg-mint lg:mt-16 xl:to-blue-black text-blue-black md:flex md:justify-between">
	<div class="relative p-16 md:p-0 md:left-20 md:top-20">
		<h4 class="font-bold leading-none h4 sm:h3 lg:h2">
			{{ __('Join Onramp for free.') }}
		</h4>

		<p class="my-6 text-xl leading-normal md:text-2xl lg:text-3xl lg:mt-10">
			{{ __('Join for free today to see the technologies and processes the team at Tighten thinks are best for you to learn, and our favorite resources for learning them.') }}
		</p>

		<a class="inline-block px-4 py-1 text-lg font-semibold text-center transition duration-200 ease-in-out border-2 rounded-full text-mint under border-blue-black bg-blue-black hover:no-underline hover:bg-mint hover:text-blue-black"
			href="{{ route_wlocale('modules.index') }}">
			{{ __("Ok, let's learn") }}
		</a>
	</div>

	<div class="hidden md:block">@include('partials.svg.logo-outline')</div>
</div>
