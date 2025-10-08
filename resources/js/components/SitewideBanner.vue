<template>
    <transition name="slide">
        <div v-if="isVisible" class="px-6 pt-12 text-center" role="alert">
            <div class="container relative bg-lake py-4">
                <p class="text-base text-white">
                    <slot name="message" />
                </p>

                <div class="absolute right-0 top-1/2 -translate-y-1/2 transform">
                    <button
                        aria-label="dismiss"
                        class="flex rounded-md p-2 transition duration-200 ease-in-out focus:bg-purple focus:outline-none"
                        type="button"
                        @click="dismiss"
                    >
                        <svg
                            class="h-6 w-6 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M6 18L18 6M6 6l12 12"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { useLocalStorage } from '@vueuse/core';

const isVisible = useLocalStorage('showSiteBanner', true);

const dismiss = () => {
    isVisible.value = false;
};

defineExpose({
    isVisible,
});
</script>
