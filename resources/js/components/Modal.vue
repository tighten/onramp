<template>
    <transition name="fade">
        <div class="bg-white fixed h-screen inset-0 overflow-scroll z-50" v-if="show">
            <button @click="close"
                class="absolute leading-0 mr-5 mt-5 top-0 right-0 text-oxford-blue text-5xl"
                aria-label="close">
                <svg class="h-6 w-6" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 47.971 47.971">
                    <path d="M28.228 23.986L47.092 5.122a2.998 2.998 0 000-4.242 2.998 2.998 0 00-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 00-4.242 0 2.998 2.998 0 000 4.242l18.865 18.864L.879 42.85a2.998 2.998 0 104.242 4.241l18.865-18.864L42.85 47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998 2.998 0 000-4.242L28.228 23.986z"/>
                </svg>
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
            window.addEventListener('keydown', this.handleEscape);
        },

        close() {
            window.removeEventListener('keydown', this.handleEscape);
            this.$root.$emit('closeModal');
        },

        handleEscape(event) {
            if (event.code === 'Escape') {
                this.close();
            }
        },
    },

    watch: {
        show: {
            handler(val) {
                if (val) {
                    this.open();
                }
            },
            immediate: true,
        },
    },
};
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.5s ease-in-out;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
