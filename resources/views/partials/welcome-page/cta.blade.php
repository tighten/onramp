<div class="pt-10 pb-20 overflow-hidden text-white lg:mt-16 bg-blue-black lg:pt-24 lg:pb-40">
	<div class="relative fluid-container">
		<picture>
			<source media="(min-width: 1024px)"
				srcset="/images/shapes/single-curve-medium-large.svg">

			<img class="absolute right-0 z-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px top-1/2 lg:h-1340-px lg:-mr-80"
				src="/images/shapes/single-curve-medium-small.svg"
				alt="Onramp">
		</picture>

		<div class="relative">
			<p class="max-w-2xl my-6 leading-normal lg:text-xl lg:leading-loose lg:my-12">
				{{ __('Join Onramp for free today to see the technologies and processes the team at Tighten thinks are best for you to learn, and our favorite resources for learning them.') }}
			</p>

			<h2 class="mt-10 lg:mt-16">{{ __("Let's do it!") }}</h2>

			<a class="mt-6 button button-white lg:mt-10"
				href="{{ route_wlocale('modules.index') }}">
				{{ __("Ok, let's learn") }}
			</a>
		</div>
	</div>
</div>
