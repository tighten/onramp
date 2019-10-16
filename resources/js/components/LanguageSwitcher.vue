<template>
    <div class="relative text-white text-left z-50">
        <button v-if="isOpen" @click="isOpen = false" tabindex="-1"
                class="fixed w-full h-full inset-0 cursor-default"></button>
        <button @click="isOpen = !isOpen" tabindex="1"
                class="relative z-50 block px-2 h-8 bg-white text-gray-800 rounded border-2 focus:outline-none focus:border-white">
            <span :class="flagClass()"></span>
            {{ language }}
        </button>
        <div v-if="isOpen" class="absolute right-0 mt-2 w-48 py-2 bg-white rounded-lg shadow-xl">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            language: {
                type: String,
                required: true
            },
            localeFlag: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                isOpen: false
            }
        },

        created() {
            const handleEscape = (e) => {
                if (e.key === 'Esc' || e.key === 'Escape') {
                    this.isOpen = false;
                }
            };

            document.addEventListener('keydown', handleEscape);

            this.$once('hook:beforeDestroy', () => {
                document.removeEventListener('keydown', handleEscape)
            });
        },

        methods: {
            flagClass() {
                return "flag-icon flag-icon-" + this.localeFlag + " mr-2";
            }
        }
    }
</script>
