<template>
    <div class="relative text-white text-left z-50">
        <button @click="isOpen = !isOpen" tabindex="1" class="relative z-50 block h-8 w-8 text-gray-100 rounded-full border-2 border-blue-300 focus:outline-none focus:border-white">{{ locale }}</button>
        <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed w-full h-full inset-0 cursor-default"></button>
        <div v-if="isOpen" class="absolute right-0 mt-2 w-48 py-2 bg-white rounded-lg shadow-xl">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            locale: {
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
                if(e.key === 'Esc' || e.key === 'Escape') {
                    this.isOpen = false;
                }
            };

            document.addEventListener('keydown', handleEscape);

            this.$once('hook:beforeDestroy', () => {
               document.removeEventListener('keydown', handleEscape)
            });
        }
    }
</script>


<!--        <select name="foo" id="bar">-->
<!--            <option v-for="locale in locales" :value="locale">{{ locale }}</option>-->
<!--        </select>-->
