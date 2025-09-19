<template>
    <div>
        <button @click="toggle" class="px-6 border rounded button button-white md:hidden">{{ buttonLabel }}</button>
        <div class="md:block" :class="{ hidden: !isOpen }">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import {ref, computed} from 'vue';

const isOpen = ref(false);

function toggle() {
    isOpen.value = !isOpen.value;
}

const buttonLabel = computed(() => (isOpen.value ? 'Hide' : 'Show'));
</script>

