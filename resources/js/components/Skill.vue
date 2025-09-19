<template>
    <li v-if="completable" class="m-1 block md:m-2">
        <CompletedBadge
            :id="id"
            :badge-text="text"
            :initial-is-completed="initCompleted"
            :type="type"
        />
    </li>
    <li
        v-else
        class="relative m-1 block px-4 py-2 text-left font-bold leading-5 text-teal sm:leading-6 md:m-2 lg:text-xl lg:leading-8"
    >
        <span
            class="absolute inset-0 h-full w-full rounded-md bg-teal bg-opacity-20 transition-all duration-200 ease-in-out"
        ></span>
        <span>{{ text }}</span>
    </li>
</template>

<script setup>
import CompletedBadge from './Completables/CompletedBadge.vue';

defineProps({
    completable: Boolean,
    initCompleted: Boolean,
    id: [String, Number],
    text: String,
    type: String,
});
</script>
