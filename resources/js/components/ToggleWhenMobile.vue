<template>
    <div>
        <button @click="toggle" class="px-4 py-1 border rounded md:hidden">{{ buttonLabel }}</button>

        <div class="md:block" v-bind:class="{ hidden: !isOpen }">
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
        },
    }
</script>
