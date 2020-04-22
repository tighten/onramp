<template>
    <completable :type="type" :id="id" :initial-is-completed="initialIsCompleted">
        <template slot-scope="{toggle, isCompleted}">
            <button
                class="relative py-2 px-4 cursor-pointer font-bold text-teal-600 hover:text-teal-600 focus:outline-none"
                :class="{'text-teal-800': isCompleted}"
                @click="toggle"
            >
                <span
                    class="absolute inset-0 bg-teal-400 opacity-10 w-full h-full rounded-md duration-100 ease-in-out transition-all hover:opacity-20"
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
