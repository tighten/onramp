<div class="py-8 lg:mt-16">
	<p class="max-w-xl px-4 mx-auto mt-5 text-xl leading-normal text-center lg:max-w-4xl md:px-0 md:text-2xl lg:text-3xl">
		{{ __("Anyone can use Onramp, but we're focusing mainly on making it easy for these three groups to become professional Laravel programmers:") }}
	</p>

	<div class="px-4 mlg:px-0 max-w-[1100px] mx-auto relative gap-4 grid grid-cols-1 pt-6 mt-8 sm:grid-cols-3">
		<div class="p-1 rounded-md bg-gradient-to-r from-teal via-teal to-violet">
			<div class="py-16 text-2xl rounded-md bg-blue-black lg:h4">
				<div
					class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
					@include('partials.svg.star')
				</div>
				<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('Brand-new developers') }}</h3>
			</div>
		</div>

		<div class="p-1 rounded-md bg-gradient-to-r from-teal via-teal to-violet">
			<div class="py-16 text-2xl rounded-md bg-blue-black lg:h4">
				<div
					class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
					@include('partials.svg.code')
				</div>
				<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('Frontend developers') }}</h3>
			</div>
		</div>

		<div class="p-1 rounded-md bg-gradient-to-r from-teal via-teal to-violet">
			<div class="py-16 text-2xl rounded-md lg:h4 bg-blue-black">
				<div
					class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-teal bg-teal-dark md:w-20 md:h-20">
					@include('partials.svg.wp')
				</div>
				<h3 class="sm:max-w-[145px] mx-auto mt-4 font-semibold text-center lg:max-w-xs">{{ __('WordPress developers') }}</h3>
		</div>
		</div>
	</div>
</div>
