<template>
    <div class="relative text-white text-left z-50">
        <button v-if="isOpen"
                @click="isOpen = false"
                tabindex="-1"
                class="fixed w-full h-full inset-0 cursor-default">
        </button>
        <div class="flex items-center">
            <label for="language-switcher" class="flex items-center relative z-50 block h-8 w-32 bg-white text-gray-800 rounded focus:outline-none">
                <span class="flex items-center pl-2 w-8 h-8 rounded-l cursor-pointer">🌐</span>
                <button @click="isOpen = !isOpen"
                        id="language-switcher"
                        tabindex="1"
                        class="ml-2 bg-white focus:outline-none focus:border-white">
                    {{ language }}
                </button>
            </label>
        </div>
        <div v-if="isOpen"
             class="absolute right-0 mt-2 w-32 py-2 bg-white rounded-lg shadow-xl">
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
