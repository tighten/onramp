@extends('layouts.app')

@section('content')

<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="relative fluid-container">
            <h1 class="max-w-xl">{{ __('Tracks') }}</h1>

            <picture>
                <source media="(min-width: 1024px)" srcset="/images/shapes/double-curve-dark-large.svg">

                <img class="absolute right-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px opacity-10 top-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                     src="/images/shapes/single-curve-dark-small.svg" alt="Onramp">
            </picture>
        </div>
    </div>
    <div class="py-16 fluid-container">
        <table class="table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Module Name</th>

                    @foreach ($tracks as $track)
                        <th class="border px-4 py-2">{{ __($track) }}</th>
                    @endforeach

                </tr>
            </thead>

            <tbody>

            @foreach ($modules as $module)
                <tr>
                    <td class="border px-4 py-2">
                        {{ __($module['module_name']) }}
                    </td>
                    @foreach ($module['has_tracks'] as $hasTrack)
                        <td class="border px-4 py-2 text-center">
                            @if ($hasTrack)
                                <svg class="w-5 mx-auto fill-current text-green-700" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

