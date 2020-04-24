<template>
    <notifications position="bottom right">
        <template slot="body" slot-scope="props">
            <div class="px-3 py-2 m-6 mt-0 text-xs font-medium text-white bg-blue-500 rounded-sm">
                <a>{{ props.item.title }}</a>
                <div v-html="props.item.text"></div>
            </div>
        </template>
    </notifications>
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
