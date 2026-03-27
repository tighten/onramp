@extends ('layouts.app')

@section ('content')
    <div class="w-full rounded-b bg-white">
        <x-hero>
            <h1 class="h2 md:h1 mb-2 font-bold tracking-wide">{{ __('Tracks') }}</h1>
        </x-hero>

        <x-panel>
            <div class="sm:hidden">
                @foreach ($tracks as $track)
                    <div class="my-2 pb-8">
                        <div class="bg-silver border-b-2 px-4 py-2 font-semibold">
                            {{
                                __(
                                    $track->name,
                                )
                            }}
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

            <div class="flex justify-center">
                <table class="hidden table-auto sm:block lg:py-10">
                    <thead>
                        <tr class="bg-silver/50">
                            <th class="border px-4 py-2">
                                {{
                                    __(
                                        'Module Name',
                                    )
                                }}
                            </th>

                            @foreach ($tracks as $track)
                                <th class="border px-4 py-2">
                                    {{
                                        __(
                                            $track->name,
                                        )
                                    }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td class="border px-4 py-2">{{ $module->name }}</td>
                                @foreach ($tracks as $track)
                                    <td class="border px-4 py-2 text-center">
                                        @if ($track->modules->pluck('id')->contains($module->id))
                                            <svg class="text-emerald mx-auto w-5 fill-current" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-panel>
    </div>
@endsection
