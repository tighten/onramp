<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        url: {
            type: String,
        },
        name: {
            type: String,
            required: true,
        },
        selected: {
            type: Boolean,
            default: false,
        },
    },

    data() {
        return {
            isActive: false,
        }
    },

    computed: {
        href() {
            if (this.url && this.url !== '') {
                return this.url;
            }

            return `#${this.name.toLowerCase().replace(/ /g, '-')}`;
        }
    },

    mounted() {
        this.isActive = this.selected;
    }
}
</script>
