<template>
    <completable :type="type" :id="id" :initial-is-completed="initialIsCompleted">
        <template slot-scope="{toggle, isCompleted}">
            <button
                class="relative flex items-start px-4 py-2 font-bold leading-5 text-left text-teal-700 cursor-pointer hover:text-teal-700 focus:outline-none sm:leading-6 md:text-xl md:leading-8 md:items-center"
                :class="{'text-teal-800': isCompleted}"
                @click="toggle"
            >
                <span
                    class="absolute inset-0 w-full h-full transition-all duration-100 ease-in-out bg-teal-400 rounded-md opacity-10 hover:opacity-20"
                    :class="{'opacity-50 hover:opacity-30': isCompleted}"
                ></span>
                
                <svg 
                    class="flex-shrink-0 w-3 h-3 mt-1 mr-3 fill-current opacity-20 sm:w-4 sm:h-4 md:mt-0"
                    :class="{'opacity-100': isCompleted}"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 30 30"
                >
                    <path d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z" fill-rule="evenodd"/>
                </svg>

                <span>
                    {{ badgeText }}
                </span>
            </button>
        </template>
    </completable>
</template>

<script>
import Completable from './Completable';

export default {
    components: {
        Completable,
    },

    props: {
        badgeText: {
            type: String,
            required: true,
        },
        initialIsCompleted: {
            type: Boolean,
            default: false
        },
        type: {},
        id: {},
    },
}
</script>
