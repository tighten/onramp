<template>
    <div class="relative inline-block text-left">
        <div>
            <slot name="toggle" :toggle="toggle">
                <span class="text-blue-violet">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center w-full text-base font-semibold transition duration-150 ease-in-out focus:outline-none focus:border-white"
                        @click="toggle"
                    >
                        {{ toggleText }}
                        <!-- <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg> -->

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

        <transition
            enter-active-class="transition duration-100 ease-out"
            enter-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
        >
            <div v-if="isOpen" class="absolute right-0 z-50 w-56 mt-2 origin-top-right rounded-md shadow-lg">
                <div class="bg-white rounded-md shadow-xs">
                    <slot></slot>
                    <!-- <template v-for="(item, i) in items">
                        <div :key="i">
                            <div class="py-1">
                                <div v-show="item.logout" class="border-t border-gray-200"></div>

                                <a
                                    :href="item.href"
                                    class="block px-4 py-2 text-sm font-medium leading-5 cursor-pointer hover:no-underline hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:bg-gray-100 focus:text-gray-800"
                                    @click="checkForLogout(item.logout, $event); $emit('menu-item-clicked', item)">{{ item.text }}</a>
                            </div>
                        </div>
                    </template> -->
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    props: {
        toggleText: {
            type: String,
            default: 'Options',
        }
    },

    data() {
        return {
            items: [],
            isOpen: false,
        }
    },

    created() {
        this.items = this.$children;
    },

    mounted() {
        this.items = this.$children;
    },

    methods: {
        checkForLogout(doLogout, event) {
            if (! doLogout) {
                return;
            }

            this.$root.$emit('logout', event);
        },

        open() {
            this.isOpen = true;
            document.addEventListener('keydown', this.handleEscape);
        },

        close() {
            this.isOpen = false;
            document.removeEventListener('keydown', this.handleEscape);
        },

        toggle() {
            this.isOpen ? this.close() : this.open();
        },

        handleEscape(e) {
            if (e.key === 'Esc' || e.key === 'Escape') {
                this.close();
            }
        }
    },
}
</script>
