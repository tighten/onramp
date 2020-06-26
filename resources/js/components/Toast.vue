<template>
    <notifications position="bottom right">
        <template slot="body" slot-scope="props">
            <div class="bg-blue-500 text-white text-xs font-medium py-2 px-3 m-6 mt-0 rounded-sm">
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
