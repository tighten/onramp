@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="bg-indigo-100 overflow-hidden pt-16 pb-20 text-left lg:pt-48 lg:pb-64">
        <div class="container mx-auto px-5 relative lg:px-12">
            <h1 class="w-11/12 lg:w-7/12 xl:w-5/12">
                {{ __('Providing an easy entrance to Laravel for new developers') }}
            </h1>

            <a
                class="inline-block rounded mt-4 px-6 py-3 font-semibold leading-tight bg-blue-violet text-white duration-150 transition ease-in-out hover:bg-indigo-600 hover:no-underline lg:mt-10 lg:px-10 lg:text-xl"
                href="#">Learn more</a>

            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/double-curve-dark-large.svg">

                <img
                    class="absolute h-670-px -mr-32 opacity-10 pointer-events-none right-0 top-1/2 transform -translate-y-1/2 lg:h-1340-px lg:-mr-48 lg:opacity-100"
                    src="/images/shapes/single-curve-dark-small.svg"
                    alt="Onramp">
            </picture>
        </div>
    </div>

    <div class="overflow-hidden">
        <div class="container mx-auto pt-12 pb-16 px-5 relative lg:px-12 lg:pt-40 lg:pb-32">
            <picture>
                <source srcset="/images/shapes/single-curve-light-wide.svg"
                    media="(min-width: 1024px)">

                <img
                    class="absolute h-760-px left-0 -ml-48 opacity-50 pointer-events-none top-1/2 transform -translate-y-1/2 -scale-x-100 z-0 lg:scale-x-100 lg:h-1630-px lg:-ml-4/12"
                    src="/images/shapes/single-curve-light-small.svg"
                    alt="Onramp">
            </picture>

            <div class="w-full mx-auto relative lg:text-center lg:max-w-3xl">
                <h2>What is this?</h2>

                <p class="leading-normal mt-8 lg:text-xl lg:mt-10">
                    Onramp aims to be a collection of resources presented in a way that makes it possible for folks to become Laravel programmers as easily and effectively as possible.
                </p>

                <p class="leading-normal mt-5 lg:text-xl lg:mt-16">
                    The goal is to make it as easy as possible for three groups of people to become capable professional Laravel developers.
                </p>
            </div>

            <div class="flex flex-wrap relative pt-6 lg:justify-center lg:text-center lg:pt-16">
                <div class="flex w-full items-center my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="bg-teal-dark w-16 h-16 bg-teal-600 rounded-full inline-flex justify-center items-center md:w-20 md:h-20">
                        <svg class="w-6 stroke-current text-white md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41 39">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M21.644 2.705l4.728 9.495c.187.374.546.632.962.692l10.572 1.523c1.047.151 1.464 1.425.707 2.157l-7.65 7.392c-.301.29-.438.708-.367 1.118l1.806 10.437c.178 1.033-.915 1.82-1.852 1.333l-9.456-4.928a1.287 1.287 0 00-1.188 0l-9.456 4.928c-.936.488-2.03-.3-1.852-1.333l1.806-10.437a1.255 1.255 0 00-.367-1.118l-7.65-7.392c-.758-.732-.34-2.006.707-2.157l10.573-1.523c.416-.06.775-.318.96-.692l4.728-9.495c.469-.94 1.82-.94 2.29 0z"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">Brand-new developers</h3>
                </div>

                <div class="flex w-full items-center my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="bg-teal-dark w-16 h-16 bg-teal-600 rounded-full inline-flex justify-center items-center md:w-20 md:h-20">
                        <svg class="w-6 stroke-current text-white md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 27">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M20.714 26.372L27.931 1M16.389 21.867l-13.36-6.04c-1.322-.599-1.384-2.453-.105-3.139l12.92-6.929M32.256 21.867l13.359-6.04c1.323-.599 1.386-2.453.107-3.139L32.801 5.76"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">Frontend developers</h3>
                </div>

                <div class="flex w-full items-center my-5 lg:w-2/6 lg:flex-wrap lg:justify-center">
                    <div class="bg-teal-dark w-16 h-16 bg-teal-600 rounded-full inline-flex justify-center items-center md:w-20 md:h-20">
                        <svg class="w-6 stroke-current text-white md:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 26">
                            <path fill="none" fill-rule="evenodd" stroke-width="3" d="M4 1.5l6.22 21.354c.616 1.322 2.527 1.385 3.234.106L18 9M16 1.5l6.268 21.354c.62 1.322 2.546 1.385 3.258.106L33 1.537M13 1.5h7.5M28.5 1.5h8M0 1.5h8"/>
                        </svg>
                    </div>
                    <h3 class="ml-4 font-semibold lg:w-full lg:ml-0 lg:mt-5">WordPress developers</h3>
                </div>
            </div>

            <!-- sidebar -->
            {{--
            <div class="w-full md:w-64">
                <aside class="rounded shadow overflow-hidden mb-6">
                    <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Categories</h3>

                    <div class="p-4">
                        <ul class="list-reset leading-normal">
                            <li><a href="#" class="text-gray-darkest text-sm">Uncategorised</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Food &amp; Drink</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Garden</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Tools</a></li>
                        </ul>
                    </div>
                </aside>

                <aside class="rounded shadow overflow-hidden mb-6">
                    <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Latest Posts</h3>

                    <div class="p-4">
                        <ul class="list-reset leading-normal">
                            <li><a href="#" class="text-gray-darkest text-sm">Lorem ipsum dolor sit amet.</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Sit amet, consectetur adipisicing elit.</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Lorem ipsum dolor sit amet.</a></li>
                            <li><a href="#" class="text-gray-darkest text-sm">Sit amet, consectetur adipisicing elit.</a></li>
                        </ul>
                    </div>
                </aside>

            </div>
            <!-- /sidebar -->
            --}}
        </div>
    </div>

    <div class="bg-blue-violet text-white overflow-hidden pb-20 pt-10 lg:pt-24 lg:pb-40">
        <div class="container mx-auto px-5 relative lg:px-12">
            <picture>
                <source media="(min-width: 1024px)"
                    srcset="/images/shapes/single-curve-medium-large.svg">

                <img
                    class="absolute h-670-px -mr-32 pointer-events-none right-0 top-1/2 transform -translate-y-1/2 z-0 lg:h-1340-px lg:-mr-80"
                    src="/images/shapes/single-curve-medium-small.svg"
                    alt="Onramp">
            </picture>

            <div class="relative">
                <p class="leading-normal my-6 max-w-2xl lg:text-xl lg:leading-loose lg:my-12">
                    It's iterative and opinionated. It's open source and contributions are welcome, but in the end Tighten will keep it focused on the way we think folks are best prepared for a career as a Laravel dev.
                </p>

                <p class="leading-normal my-6 max-w-2xl lg:text-xl lg:leading-loose lg:my-12">
                    Right now we're keeping it just a bullet point list so we can gather great content from the community, but shortly we'll turn it into a more fully-fledge site with user accounts and deeper context for every item.
                </p>

                <h2 class="mt-10 lg:mt-20">Let's do it!</h2>

                <a class="inline-block rounded mt-6 px-6 py-3 font-semibold leading-tight bg-white text-blue-violet hover:text-indigo-600 hover:no-underline lg:text-xl"
                    href="{{ route_wlocale('modules.index') }}">
                    OK, let's learn
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
