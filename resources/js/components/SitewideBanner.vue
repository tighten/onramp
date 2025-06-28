<template>
    <transition name="slide">
        <div
            v-if="isVisible"
            class="px-6 text-center pt-12"
            role="alert"
        >
            <div class="relative py-4 container bg-lake">
                <p class="text-base text-white">
                    <slot name="message"/>
                </p>

                <div
                    class="absolute right-0 transform -translate-y-1/2 top-1/2"
                >
                    <button
                        aria-label="dismiss"
                        class="flex p-2 transition duration-200 ease-in-out rounded-md focus:outline-none focus:bg-purple"
                        type="button"
                        @click="dismiss"
                    >
                        <svg
                            class="w-6 h-6 text-white"
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
import {useLocalStorage} from '@vueuse/core';

const isVisible = useLocalStorage('showSiteBanner', true);

const dismiss = () => {
    isVisible.value = false;
};

defineExpose({
    isVisible
});
</script>

