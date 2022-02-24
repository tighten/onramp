@props(['flex' => null, 'fluid' => null])

<div class="w-full mx-auto">
	<div {{ $attributes }} class="py-12 -mt-px bg-white rounded-b-lg panel mx-auto {{ $fluid ? 'fluid-container' : 'container' }} {{ $flex ? 'md:flex items-start' : '' }}">
		{{ $slot }}
	</div>
</div>
