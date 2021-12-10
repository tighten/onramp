<div class="py-12 lg:mt-16">
	<p class="max-w-xl px-4 mx-auto mt-5 text-xl leading-normal text-center lg:max-w-4xl md:px-0 md:text-2xl lg:text-3xl">
		{{ __("Anyone can use Onramp, but we're focusing mainly on making it easy for these three groups to become professional Laravel programmers:") }}
	</p>

	<div class="relative grid grid-cols-1 pt-6 mt-6 sm:grid-cols-3 lg:pt-16">
		<div class="mb-12 text-2xl md:mb-0 lg:h4">
			<div
				class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
				@include('partials.svg.star')
			</div>
			<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('Brand-new developers') }}</h3>
		</div>

		<div class="mb-12 text-2xl md:mb-0 lg:h4">
			<div
				class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
				@include('partials.svg.code')
			</div>
			<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('Frontend developers') }}</h3>
		</div>

		<div class="mb-12 text-2xl md:mb-0 lg:h4">
			<div
				class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
				@include('partials.svg.wp')
			</div>
			<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('WordPress developers') }}</h3>
		</div>
	</div>
</div>
