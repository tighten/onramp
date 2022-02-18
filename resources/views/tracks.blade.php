@extends('layouts.app')

@section('content')

<div class="w-full bg-white rounded-b">
    <x-hero>
        <h1 class="mb-2 font-bold tracking-wide h2 md:h1">{{ __('Tracks') }}</h1>
    </x-hero>

    <div class="items-start w-full py-20 -mt-px bg-white rounded-b fluid-container">
        <div class="sm:hidden">
            @foreach ($tracks as $track)
                <div class="pb-8 my-2">
                    <div class="px-4 py-2 font-semibold bg-gray-100 border-b-2">
                        {{ __($track->name) }}
                    </div>
                    <div>
                        <div class="px-6 py-2 font-semibold">{{ __('Modules') }}:</div>
                        @foreach ($track->modules as $module)
                            <div class="px-6 py-2">{{ $module->name }}</div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>


        <table class="hidden table-auto sm:block">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">{{ __('Module Name') }}</th>

                    @foreach ($tracks as $track)
                        <th class="px-4 py-2 border">{{ __($track->name) }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td class="px-4 py-2 border">
                        {{ __($module->name) }}
                    </td>
                    @foreach ($tracks as $track)
                        <td class="px-4 py-2 text-center border">
                            @if ($track->modules->pluck('id')->contains($module->id))
                                <svg class="w-5 mx-auto text-green-700 fill-current" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
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
