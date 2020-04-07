<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            required: true,
        },
        selected: {
            type: Boolean,
            default: false,
        }
    },

    data() {
        return {
            isActive: false,
        }
    },

    computed: {
        href() {
            return `#${this.name.toLowerCase().replace(/ /g, '-')}`;
        }
    },

    mounted() {
        this.isActive = this.selected;
    }
}
</script>
