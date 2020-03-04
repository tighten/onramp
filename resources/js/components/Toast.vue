<template>
    <notifications
        class="z-50"
        position="bottom right"></notifications>
</template>

<script>
    export default {
        props: {
            'message': {
                type: String,
            }
        },

        mounted() {
            this.$notify({
                'text': this.message,
            });
        }
    }
</script>
