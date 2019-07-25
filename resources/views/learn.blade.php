@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">Learn Laravel</h1>
        <p class="leading-loose text-gray-dark">
            The tech concepts you should know in order to get a job as a Laravel developer.
        </p>
    </div>
    <!-- /title -->

    {{-- Content for this page will eventually likely be in a DB. Right now, check out learn.php. --}}

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-12">
            <ul class="temp-learn-list">
                @foreach ($learn as $item)
                <li>
                    <div class="list-title">{{ $item['name'] }}</div>
                    @if (isset($item['links']))
                    {!!
                        collect($item['links'])->map(function ($value, $key) {
                            return "<a href='{$value}'>{$key}</a>";
                        })->join(', ')
                    !!}
                    @endif

                    @if (isset($item['children']))
                    <ul>
                        @foreach ($item['children'] as $childItem)
                        <li>
                            <div class="list-title">{{ $childItem['name'] }}</div>
                            @if (isset($childItem['links']))
                            {!!
                                collect($childItem['links'])->map(function ($value, $key) {
                                    return "<a href='{$value}'>{$key}</a>";
                                })->join(', ')
                            !!}
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>

            <p>That's all, for now. Soon: more and better organized links to places to learn each of these technologies/tools, a more robust list of technologies, etc., and then later maybe exercises to test them and prove out your learning.</p>
        </div>
    </div>
</div>
@endsection
