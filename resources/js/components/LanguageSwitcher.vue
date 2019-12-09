<template>
    <div class="relative text-white z-50">
        <button v-if="isOpen"
                @click="close()"
                tabindex="-1"
                class="fixed w-full h-full inset-0 cursor-default">
        </button>
        <div class="flex items-center justify-center">
            <label for="language-switcher"
                   class="flex items-center relative z-50 block h-8 w-32 bg-white hover:bg-blue-100 text-gray-800 rounded focus:outline-none">
                <span class="flex items-center pl-2 w-8 h-8 rounded-l cursor-pointer">🌐</span>
                <button @click="open()"
                        id="language-switcher"
                        tabindex="1"
                        class="ml-2 focus:outline-none focus:border-white">
                    {{ language }}
                </button>
            </label>
        </div>
        <div v-if="isOpen"
             class="absolute border border-blue-700 right-0 mt-2 w-32 bg-white rounded shadow-xl">
            <a v-for="locale in locales"
               @click.prevent="toggleLanguage(locale.locale)"
               class="block px-4 py-2 text-blue-700 hover:bg-blue-700 hover:text-white cursor-pointer"
               style="text-decoration: none">
                {{ locale.language }}
            </a>
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
            locales: {
                type: Array,
                required: true
            },
            currentPath: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                isOpen: false,
            }
        },
        methods: {
            open() {
                this.isOpen = true;
                document.addEventListener('keydown', this.handleEscape);
            },
            close() {
                this.isOpen = false;
                document.removeEventListener('keydown', this.handleEscape);
            },
            toggleLanguage(locale) {

                // @todo Add appropriate exception handling.
                axios.post(Ziggy.baseUrl + locale + "/api/preferences", {
                    locale: locale,
                    currentPath: this.currentPath,
                }).then(response => {
                    window.location.href = response.data.redirectTo;
                });
                this.close()
            },
            handleEscape(e) {
                if (e.key === 'Esc' || e.key === 'Escape') {
                    this.close();
                }
            }
        }
    }
</script>
