@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="py-16 overflow-hidden bg-indigo-100 lg:py-24">
        <div class="fluid-container md:flex md:items-start md:justify-between">
            <h1 class="max-w-lg">{{ __('My modules') }}</h1>
            <p class="mt-4 text-lg md:mt-0 lg:text-xl">
                <span class="font-bold">
                    Welcome back {{ Auth::user()->first_name }},
                </span><br>ready for your next lesson?
            </p>
        </div>
    </div>

    <tabs class="pt-12 xl:pt-20">
        <tab name="In Progress" :selected="true">
            <div class="px-2 pb-48 fluid-container md:px-8 lg:px-20 xxl:px-32">
                <div class="flex flex-wrap lg:-mx-3">
                    @forelse ($modules as $module)
                        @php
                        $buttonText = 'Finish module';
                        $bgColor = 'bg-teal-400';

                        switch($module->skill_level) {
                            case 'intermediate':
                                $bgColor = 'bg-cornflower-blue';
                                break;
                            case 'advanced':
                                $bgColor = 'bg-pink-800';
                                break;
                            default:
                                break;
                        }
                        @endphp

                        @include('partials.card-on-my-module-page')
                    @empty
                        <p class="px-3">No modules yet</p>
                    @endforelse
                </div>
            </div>
        </tab>

        <tab name="Completed">
            <div class="px-2 pb-48 fluid-container md:px-8 lg:px-20 xxl:px-32">
                <div class="flex flex-wrap lg:-mx-3">
                    @forelse ($completedModules as $module)
                        @php
                        $buttonText = 'View module';
                        $bgColor = 'bg-teal-400';

                        switch($module->skill_level) {
                            case 'intermediate':
                                $bgColor = 'bg-cornflower-blue';
                                break;
                            case 'advanced':
                                $bgColor = 'bg-pink-800';
                                break;
                            default:
                                break;
                        }
                        @endphp

                        @include('partials.card-on-my-module-page')
                    @empty
                        <p class="px-3">No modules yet</p>
                    @endforelse
                </div>
            </div>
        </tab>
    </tabs>
</div>
@endsection
