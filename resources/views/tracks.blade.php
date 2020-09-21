@extends('layouts.app')

@section('content')

<div class="w-full bg-white">

    <div class="py-16 fluid-container">


    <table class="table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Module Name</th>

                @foreach ($tracks as $track)
                    <th class="border px-4 py-2">{{ $track }}</th>
                @endforeach

            </tr>
        </thead>

        <tbody>

        @foreach ($modules as $module)
            <tr>
                <td class="border px-4 py-2">
                    {{ ($module['module_name']) }}
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

@endsection

