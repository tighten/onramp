<template>
    <completable
        :type="type"
        :id="id"
        :initial-is-completed="initialIsCompleted"
    >
        <template slot-scope="{ toggle, isCompleted }">
            <button
                class="relative flex items-start px-4 py-2 font-bold leading-5 text-left transition rounded cursor-pointer text-emerald bg-teal bg-opacity-20 focus:outline-none sm:leading-6 lg:leading-8 lg:items-center"
                :class="
                    isCompleted
                        ? 'bg-opacity-10 hover:bg-opacity-20'
                        : 'bg-opacity-25 hover:bg-opacity-30'
                "
                @click="toggle"
            >
                <span>
                    {{ badgeText }}
                </span>

                <svg
                    v-if="isCompleted"
                    class="w-3 h-3 ml-3 fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0zm3.94 5.94L8.5 11.378l-1.94-1.94-2.12 2.122 4.06 4.06 7.56-7.56-2.12-2.122z"
                        fill-rule="evenodd"
                    />
                </svg>
            </button>
        </template>
    </completable>
</template>

<script>
import Completable from "./Completable.vue";

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
            default: false,
        },
        type: {},
        id: {},
    },
};
</script>
