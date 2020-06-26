<template>
    <div>
        <button @click="toggle" class="px-6 border rounded button button-white md:hidden">{{ buttonLabel }}</button>

        <div class="md:block" v-bind:class="{ hidden: !isOpen }">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import toggle from '../mixins/toggle';

export default {
    mixins: [toggle],

    computed: {
        buttonLabel() {
            return this.isOpen ? 'Hide' : 'Show';
        },
    },
}
</script>
