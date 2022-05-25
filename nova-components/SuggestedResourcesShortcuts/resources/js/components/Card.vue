<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
            <h1 class="mb-2 text-2xl font-light text-center text-90">Resource Suggestions</h1>
            <p class="mb-2 leading-normal text-center">Hey friends! If you'd like to contribute to Onramp, you can suggest resources for us to include here:</p>
            <p class="leading-normal text-center">
                <a class="font-bold text-primary-500" href="/nova/resources/suggested-resources/new">Suggest a new resource</a> |
                <a class="font-bold text-primary-500" href="/nova/resources/suggested-resources/">See all suggested resources</a>
            </p>
        </div>
  </Card>
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
