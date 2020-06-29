<template>
    <completable :type="type" :id="id" :initial-is-completed="initialIsCompleted">
        <template slot-scope="{toggle, isCompleted}">
            <button
                class="relative px-4 py-2 font-bold text-teal-700 cursor-pointer hover:text-teal-700 focus:outline-none"
                :class="{'text-teal-800': isCompleted}"
                @click="toggle"
            >
                <span
                    class="absolute inset-0 w-full h-full bg-teal-400 opacity-10 rounded-md duration-100 ease-in-out transition-all hover:opacity-20"
                    :class="{'opacity-50 hover:opacity-30': isCompleted}"
                ></span>
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
