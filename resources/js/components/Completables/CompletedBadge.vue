<template>
    <completable
        :type="type"
        :id="id"
        :initial-is-completed="initialIsCompleted"
    >
        <template slot-scope="{ toggle, isCompleted }">
            <button
                class="relative flex items-start px-4 py-2 font-bold leading-5 text-left cursor-pointer text-teal hover:text-teal focus:outline-none sm:leading-6 lg:text-xl lg:leading-8 lg:items-center"
                :class="{ 'text-emerald': isCompleted }"
                @click="toggle"
            >
                <span
                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal hover:bg-opacity-10"
                    :class="{ 'opacity-50 hover:opacity-30': isCompleted }"
                ></span>
                <span>
                    {{ badgeText }}
                </span>
            </button>
        </template>
    </completable>
</template>

<script>
import Completable from "./Completable.vue";

export default {
    components: {
        Completable
    },

    props: {
        badgeText: {
            type: String,
            required: true
        },
        initialIsCompleted: {
            type: Boolean,
            default: false
        },
        type: {},
        id: {}
    }
};
</script>
