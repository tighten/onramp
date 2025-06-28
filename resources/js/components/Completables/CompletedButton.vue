<template>
    <completable
        :id="id"
        :initial-is-completed="initialIsCompleted"
        :type="type"
    >
        <template v-slot="{ toggle, isCompleted }">
            <button
                :aria-label="
                    isCompleted ? 'mark as incomplete' : 'mark as completed'
                "
                :class="{
                    'bg-white text-teal hover:bg-transparent hover:text-white':
                        isCompleted,
                }"
                class="flex items-center justify-center w-full px-4 py-2 mt-8 text-sm font-semibold leading-none text-white transition-colors duration-200 ease-in-out border-2 border-white rounded-3xl hover:bg-white hover:text-teal focus:outline-none lg:mt-0"
                @click="toggle"
            >
                <svg
                    v-if="!isCompleted"
                    class="w-5 h-5 mr-4 fill-current"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0zm3.94 5.94L8.5 11.378l-1.94-1.94-2.12 2.122 4.06 4.06 7.56-7.56-2.12-2.122z"
                        fill-rule="evenodd"
                    />
                </svg>

                <svg
                    v-else
                    :class="{
                        'fill-teal': isCompleted,
                    }"
                    class="w-5 h-5 mr-4 fill-current"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.151 17.943l-4.143-4.102L7.891 18l-1.833-1.833 4.104-4.157L6 7.891l1.833-1.833 4.155 4.102L16.094 6l1.849 1.849-4.1 4.141L18 16.094l-1.849 1.849z"
                    />
                </svg>

                <span
                    :class="{
                        'bg-white text-teal hover:bg-transparent': isCompleted
                    }"
                    class="inline-block"
                >
                    {{
                        isCompleted ? "Mark as Incomplete" : "Mark as Completed"
                    }}
                </span>
            </button>
        </template>
    </completable>
</template>

<script setup>
import Completable from "./Completable.vue";

defineProps({
    initialIsCompleted: {
        type: Boolean,
        default: false,
    },
    type: {
        type: String,
        required: true
    },
    id: {
        type: [String, Number],
        required: true
    },
});
</script>
