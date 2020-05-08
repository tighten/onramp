<template>
    <transition name="slide">
        <div
            v-if="isVisible"
            class="px-6 text-center bg-oxford-blue"
            role="alert"
        >
            <div class="relative py-4 fluid-container">
                <p class="text-base text-white">
                    <slot name="message"></slot>
                </p>

                <div class="absolute right-0 transform -translate-y-1/2 top-1/2">
                    <button
                        @click="dismiss"
                        type="button"
                        class="flex p-2 transition duration-150 ease-in-out rounded-md hover:bg-blue-violet focus:outline-none focus:bg-blue-violet"
                        aria-label="dismiss"
                    >
                        <svg class="w-6 h-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data() {
        return {
            isVisible: false,
        }
    },

    methods: {
        dismiss() {
            this.isVisible = false;
        }
    },

    mounted() {
        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.showSiteBanner) {
                this.isVisible = JSON.parse(localStorage.showSiteBanner)

                if (! this.isVisible) {
                    return;
                }
            } else {
                setTimeout(() => {
                    this.isVisible = true;
                }, 1000);
            }
        });
    },

    watch: {
        isVisible(value) {
            localStorage.showSiteBanner = value;
        },
    }
}
</script>

<style scoped>
.slide-enter-active {
   transition-duration: 0.5s;
   transition-timing-function: ease-in;
}

.slide-leave-active {
   transition-duration: 0.5s;
   transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
}

.slide-enter-to, .slide-leave {
   max-height: 100px;
   overflow: hidden;
}

.slide-enter, .slide-leave-to {
   overflow: hidden;
   max-height: 0;
}
</style>
