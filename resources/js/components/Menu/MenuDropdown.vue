<template>
    <div class="relative inline-block text-left" v-click-outside="close">
        <div>
            <slot name="toggle" :toggle="toggle">
                <span class="text-blue-violet">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center w-full h-12 text-base font-semibold transition duration-150 ease-in-out focus:outline-none focus:border-white hover:opacity-75 transition ease-in-out duration-150"
                        @click="toggle"
                    >
                        {{ toggleText }}

                        <svg class="w-3 h-auto ml-2 stroke-current"
                            :class="{ 'transform -scale-y-100': isOpen }"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 11">
                            <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round"/>
                        </svg>
                    </button>
                </span>
            </slot>
        </div>

        <transition name="grow">
            <div v-if="isOpen" class="absolute right-0 z-50 w-32 mt-2 origin-top-right rounded-md shadow-lg">
                <div class="overflow-hidden bg-white rounded-md shadow-xs">
                    <slot></slot>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import toggle from '../../mixins/toggle';

export default {
    mixins: [toggle],

    props: {
        toggleText: {
            type: String,
            default: 'Options',
        }
    },

    data() {
        return {
            items: [],
        }
    },

    methods: {
        checkForLogout(doLogout, event) {
            if (! doLogout) {
                return;
            }

            this.$root.$emit('logout', event);
        },
    },
}
</script>

<style scoped>
.grow-enter-active {
    transition: 100ms ease-out;
}

.grow-leave-active {
    transition: 75ms ease-in;
}

.grow-enter-to, .grow-leave {
   opacity: 1;
   transform: scale(1);
}

.grow-enter, .grow-leave-to {
   opacity: 0;
   transform: scale(0.95);
}
</style>
