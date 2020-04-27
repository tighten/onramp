@php
    $evenCardColor = 'bg-teal-600';
    $oddCardColor = 'bg-teal-400';

    switch($module->skill_level) {
        case 'intermediate':
            $evenCardColor = 'bg-cornflower-blue';
            $oddCardColor = 'bg-blue-violet';
            break;
        case 'advanced':
            $evenCardColor = 'bg-pink-900';
            $oddCardColor = 'bg-pink-800';
            break;
        default:
            break;
    }
@endphp

<div class="flex-initial w-full px-3 pb-5 sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
    <a class="flex flex-col h-full transition-transform duration-300 transform shadow-md hover:no-underline hover:scale-95" href="{{ route_wlocale('modules.show', ['module' => $module, 'resourceType' => 'free-resources']) }}">
        <span class="relative block pb-8/12 xl:pb-3/5 {{ $loop->even ? $evenCardColor : $oddCardColor }}">
            {{-- @todo add this in once graphics are provided for each module
                <img class="absolute bottom-0 w-3/4 transform -translate-x-1/2 left-1/2 will-change-transform"
                src="/images/temp/img_basicwebsite.svg" alt="Image for the {{ $module->name }} module.">
            --}}
        </span>
        <span class="flex-1 block p-5 pb-8 bg-white xl:px-8 xl:pb-10">
            <h4 class="font-semibold tracking-tighter text-east-bay lg:text-lg">{{ $module->name }}</h4>
        </span>
    </a>
</div>
