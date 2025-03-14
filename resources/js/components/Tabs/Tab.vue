<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';

const props = defineProps({
    url: {
        type: String,
    },
    name: {
        type: String,
        required: true,
    },
    selected: {
        type: Boolean,
        default: false,
    },
});

const isActive = ref(false);

onMounted(() => {
    isActive.value = props.selected;
});

watch(
    () => props.selected,
    (newVal) => {
        isActive.value = newVal;
    }
);
</script>
