@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">{{ __('Onramp to Laravel') }}</h1>
        <p class="leading-loose text-gray-dark">
            Providing an easy entrance to Laravel for new developers
        </p>
    </div>
    <!-- /title -->

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-12">
            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">
                What is this?
            </h2>

            <p class="text-gray-700 leading-normal mb-4">
                Onramp aims to be a collection of resources presented in a way that makes it possible for folks to become Laravel programmers as easily and effectively as possible.
            </p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">
                Who is it for?
            </h2>
            <p class="text-gray-700 leading-normal mb-4">
                The goal is to make it as easy as possible for three groups of people to become capable professional Laravel developers: <strong>Brand-new developers</strong>, <strong>frontend developers</strong>, and <strong>WordPress developers</strong>.
            </p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">
                Why is it so simple?
            </h2>
            <p class="text-gray-700 leading-normal mb-4">
                It's iterative and opinionated. It's open source and contributions are welcome, but in the end Tighten will keep it focused on the way we think folks are best prepared for a career as a Laravel dev.
            </p>
            <p class="text-gray-700 leading-normal mb-4">
                Right now we're keeping it just a bullet point list so we can gather great content from the community, but shortly we'll turn it into a more fully-fledge site with user accounts and deeper context for every item.
            </p>

            <h2 class="mb-2 mt-8 text-black text-xl md:text-2xl">
                Let's do it!
            </h2>

            <p>OK, let's <a href="{{ route_wlocale('modules.index') }}">learn.</a></p>
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
@endsection
