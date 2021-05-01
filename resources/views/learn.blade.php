@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="px-6 py-12 mb-6 text-center bg-gray-100 border-b">
        <h1 class="pb-4 text-xl  md:text-4xl">{{ __('Learn Laravel') }}</h1>
        <p class="leading-loose text-gray-dark">
            {{ __('The tech concepts you should know in order to get a job as a Laravel developer.') }}
        </p>
    </div>

    <div class="container items-start max-w-4xl px-6 py-8 mx-auto md:flex md:px-0">
        <div class="w-full mb-6 md:pr-12">
            <ul class="temp-learn-list">
                @foreach ($learn as $item)
                <li>
                    <div class="list-title">{!! $item['name'] !!}</div>
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
                            <div class="list-title">{!! $childItem['name'] !!}</div>
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

            <hr class="mt-12 border-b border-gray-500">

            <p class="mt-12">{{ __("That's all, for now.") }}<br><br>{{ __("Soon: more and better organized links to places to learn each of these technologies/tools, a more robust list of technologies, etc., and then later maybe exercises to test them and prove out your learning.") }}</p>
        </div>
    </div>
</div>
@endsection
