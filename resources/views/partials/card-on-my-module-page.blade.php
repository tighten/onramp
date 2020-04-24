<div class="w-full p-3 sm:w-1/2 lg:w-1/3">
    <div class="flex flex-col w-full h-full bg-white shadow-md hover:no-underline">
        <p class="flex-initial block {{ $bgColor }} pb-7/12 lg:pb-3/5">
        </p>

        <div class="relative flex-1 block px-6 pt-8 pb-24 text-base xl:pt-12 xl:text-xl">
            <span class="text-xl font-semibold md:tracking-tighter xl:text-3xl">
                {{ $module->name }}
            </span>

            <ul class="block mt-6">
                <li class="inline-flex items-center justify-between w-full">
                    <span class="text-east-bay">Resources</span>
                    <span class="font-semibold text-gray-900">80%</span>
                </li>

                <li class="inline-flex items-center justify-between w-full mt-3">
                    <span class="text-east-bay">Quizzes</span>
                    <span class="font-semibold text-gray-900">20%</span>
                </li>

                <li class="inline-flex items-center justify-between w-full mt-3">
                    <span class="text-east-bay">Exercises</span>
                    <span class="font-semibold text-gray-900">20%</span>
                </li>
            </ul>

            <p class="absolute bottom-0 left-0 w-full px-6 pb-6">
                <a class="w-full text-base text-center button button-teal xxl:text-xl"
                    href="{{ route_wlocale('modules.show', [
                        'module' => $module,
                        'resourceType' => 'free-resources'
                    ]) }}">
                    <span>{{ $buttonText }}</span>
                </a>
            </p>
        </div>
    </div>
</div>
