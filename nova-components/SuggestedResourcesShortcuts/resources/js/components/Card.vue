<template>
    <card class="flex flex-col">
        <div class="px-3 py-3">
            <h1 class="text-center mb-2 text-2xl text-90 font-light">Resource Suggestions</h1>
            <p class="leading-normal mb-2">Hey friends! If you'd like to contribute to Onramp, you can suggest resources for us to include here:</p>
            <p class="leading-normal">
                <a href="/nova/resources/suggested-resources/new">Suggest a new resource</a> |
                <a href="/nova/resources/suggested-resources/">See all suggested resources</a>
            </p>
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    mounted() {
        //
    },
}
</script>
