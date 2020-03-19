<template>
    <div class="relative z-50">
        <button v-if="isOpen"
                @click="close()"
                tabindex="-1"
                class="fixed w-full h-full inset-0 cursor-default hidden">
        </button>

        <div class="px-6 py-3 lg:p-0">
            <label for="language-switcher"
                   class="flex items-center text-blue-violet focus:outline-none">

                <button @click="toggle()"
                        id="language-switcher"
                        tabindex="1"
                        class="font-semibold mr-3 text-md focus:outline-none focus:border-white">
                    {{ language }}
                </button>

                <svg class="h-auto stroke-current text-blue-violet w-3"
                    :class="{ 'transform -scale-y-100': isOpen }"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 11">
                    <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round"/>
                </svg>
            </label>
        </div>

        <transition
            enter-active-class="transition-height duration-500 ease-in-out"
            leave-active-class="transition-height duration-500 ease-in-out"
            enter-class="max-h-0"
            enter-to-class="max-h-1000"
            leave-class="max-h-1000"
            leave-to-class="max-h-0">
            <div v-if="isOpen" class="bg-white overflow-hidden lg:absolute lg:mt-12 lg:shadow-xl lg:left-0 lg:top-0">
                 <!-- border border-blue-700 right-0 mt-2 w-32 bg-white rounded shadow-xl lg:absolute -->
                <button v-for="(lang, slug) in languages"
                    :key="slug"
                    @click="choose(slug)"
                    class="block font-normal w-full text-left px-6 py-2 text-blue-violet focus:outline-none hover:bg-indigo-100">{{ lang }}</button>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            language: {
                type: String,
                required: true
            },

            languages: {
                type: Object,
            },
        },

        data() {
            return {
                isOpen: false,
                domLocation: window.location,
            }
        },

        methods: {
            choose(value) {
                axios.patch(route('user.preferences.update', { 'locale': 'en' }), {
                    'locale': value,
                })
                .then(() => {
                    let segments = this.domLocation.pathname.split('/');
                    segments[1] = value;
                    window.location = `${this.domLocation.origin}${segments.join('/')}`;
                })
                .catch((error) => {
                    alert('Error!');
                });
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
                if (this.isOpen) {
                    this.close();
                } else {
                    this.open();
                }
            },

            handleEscape(e) {
                if (e.key === 'Esc' || e.key === 'Escape') {
                    this.close();
                }
            }
        },
    }
</script>
