<template>
    <transition name="fade">
        <div
            class="fixed inset-0 z-50 h-screen min-w-xs"
            v-if="show"
        >
            <button
                @click="close"
                class="absolute top-0 right-0 mt-5 mr-5 text-5xl leading-0 text-mint"
                aria-label="close"
            >
                hello
            </button>

            <slot :close="close"></slot>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        show: {}
    },

    methods: {
        open() {
            window.addEventListener("keydown", this.handleEscape);
        },

        close() {
            window.removeEventListener("keydown", this.handleEscape);
            this.$root.$emit("closeModal");
        },

        handleEscape(event) {
            if (event.code === "Escape") {
                this.close();
            }
        }
    },

    watch: {
        show: {
            handler(val) {
                if (val) {
                    this.open();
                }
            },
            immediate: true
        }
    }
};
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.25s ease-in-out;
}

.fade-leave-active,
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
