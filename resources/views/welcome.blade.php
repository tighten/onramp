@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="pt-16 pb-20 overflow-hidden text-left bg-indigo-100 lg:pt-48 lg:pb-64">
        <div class="relative fluid-container">
            <h1 class="w-11/12 md:w-7/12 xl:w-5/12">
                {{ __('Providing an easy entrance to Laravel for new developers') }}
            </h1>

            <a
                class="mt-6 button button-purple lg:mt-10"
                href="#overview">
                <span>{{ __('Learn more') }}</span>
            </a>

            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/double-curve-dark-large.svg">

                <img
                    class="absolute right-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px opacity-10 top-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg"
                    alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="overflow-hidden" id="overview">
        <div class="relative pt-12 pb-16 fluid-container lg:pt-40 lg:pb-32">
            <picture>
                <source srcset="/images/shapes/single-curve-light-wide.svg"
                    media="(min-width: 1024px)">

                <img
                    class="absolute left-0 z-0 -ml-48 transform -translate-y-1/2 opacity-50 pointer-events-none h-760-px top-1/2 -scale-x-100 lg:scale-x-100 lg:h-1630-px lg:-ml-4/12"
                    src="/images/shapes/single-curve-light-small.svg"
                    alt="Onramp">
            </picture>

            <div class="relative w-full mx-auto lg:text-center lg:max-w-3xl">
                <h2>What is this?</h2>

                <p class="mt-8 leading-normal lg:text-xl lg:mt-10">
                    Onramp aims to be a collection of resources presented in a way that makes it possible for folks to become Laravel programmers as easily and effectively as possible.
                </p>

                <p class="mt-5 leading-normal lg:text-xl lg:mt-16">
                    The goal is to make it as easy as possible for three groups of people to become capable professional Laravel developers.
                </p>
            </div>

            <div class="relative flex flex-wrap pt-6 lg:justify-center lg:text-center lg:pt-16">
                <div class="flex items-center w-full my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-teal-700 rounded-full bg-teal-dark md:w-20 md:h-20">
                        <svg class="w-6 text-white stroke-current md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41 39">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M21.644 2.705l4.728 9.495c.187.374.546.632.962.692l10.572 1.523c1.047.151 1.464 1.425.707 2.157l-7.65 7.392c-.301.29-.438.708-.367 1.118l1.806 10.437c.178 1.033-.915 1.82-1.852 1.333l-9.456-4.928a1.287 1.287 0 00-1.188 0l-9.456 4.928c-.936.488-2.03-.3-1.852-1.333l1.806-10.437a1.255 1.255 0 00-.367-1.118l-7.65-7.392c-.758-.732-.34-2.006.707-2.157l10.573-1.523c.416-.06.775-.318.96-.692l4.728-9.495c.469-.94 1.82-.94 2.29 0z"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">Brand-new developers</h3>
                </div>

                <div class="flex items-center w-full my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-teal-700 rounded-full bg-teal-dark md:w-20 md:h-20">
                        <svg class="w-6 text-white stroke-current md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 27">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M20.714 26.372L27.931 1M16.389 21.867l-13.36-6.04c-1.322-.599-1.384-2.453-.105-3.139l12.92-6.929M32.256 21.867l13.359-6.04c1.323-.599 1.386-2.453.107-3.139L32.801 5.76"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">Frontend developers</h3>
                </div>

                <div class="flex items-center w-full my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-teal-700 rounded-full bg-teal-dark md:w-20 md:h-20">
                        <svg class="w-6 text-white stroke-current md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 26">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M4 1.5l6.22 21.354c.616 1.322 2.527 1.385 3.234.106L18 9M16 1.5l6.268 21.354c.62 1.322 2.546 1.385 3.258.106L33 1.537M13 1.5h7.5M28.5 1.5h8M0 1.5h8"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">WordPress developers</h3>
                </div>
            </div>

            <!-- sidebar -->
            {{--
            <div class="w-full md:w-64">
                <aside class="mb-6 overflow-hidden rounded shadow">
                    <h3 class="px-4 py-3 text-sm text-gray-700 bg-gray-100 border-b">Categories</h3>

                    <div class="p-4">
                        <ul class="leading-normal list-reset">
                            <li><a href="#" class="text-sm text-gray-darkest">Uncategorised</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Food &amp; Drink</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Garden</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Tools</a></li>
                        </ul>
                    </div>
                </aside>

                <aside class="mb-6 overflow-hidden rounded shadow">
                    <h3 class="px-4 py-3 text-sm text-gray-700 bg-gray-100 border-b">Latest Posts</h3>

                    <div class="p-4">
                        <ul class="leading-normal list-reset">
                            <li><a href="#" class="text-sm text-gray-darkest">Lorem ipsum dolor sit amet.</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Sit amet, consectetur adipisicing elit.</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Lorem ipsum dolor sit amet.</a></li>
                            <li><a href="#" class="text-sm text-gray-darkest">Sit amet, consectetur adipisicing elit.</a></li>
                        </ul>
                    </div>
                </aside>

            </div>
            <!-- /sidebar -->
            --}}
        </div>
    </div>

    <div class="pt-10 pb-20 overflow-hidden text-white bg-blue-violet lg:pt-24 lg:pb-40">
        <div class="relative fluid-container">
            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/single-curve-medium-large.svg">

                <img
                    class="absolute right-0 z-0 -mr-32 transform -translate-y-1/2 pointer-events-none h-670-px top-1/2 lg:h-1340-px lg:-mr-80"
                    src="/images/shapes/single-curve-medium-small.svg"
                    alt="Onramp">
            </picture>

            <div class="relative">
                <p class="max-w-2xl my-6 leading-normal lg:text-xl lg:leading-loose lg:my-12">
                    It's iterative and opinionated. It's open source and contributions are welcome, but in the end Tighten will keep it focused on the way we think folks are best prepared for a career as a Laravel developer.
                </p>

                <h2 class="mt-10 lg:mt-16">Let's do it!</h2>

                <a class="mt-6 button button-white lg:mt-10"
                    href="{{ route_wlocale('modules.index') }}">
                    Ok, let's learn
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
