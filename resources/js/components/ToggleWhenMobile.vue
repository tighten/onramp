<template>
    <div>
        <button @click="toggle" class="border rounded py-1 px-4 md:hidden">{{ buttonLabel }}</button>

        <div v-show="slotVisible" class="mb-2">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: false,
            }
        },

        methods: {
            toggle() {
                this.isOpen = ! this.isOpen;
            },
        },

        computed: {
            buttonLabel() {
                return this.isOpen ? 'Hide' : 'Show';
            },
            slotVisible() {
                if (window.innerWidth >= 768) {
                    this.isOpen = true;
                };
                return this.isOpen;
            }
        },
    }
</script>
