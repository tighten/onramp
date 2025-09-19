<template>
    <!--    The toast library does not require a template tag to be present. However, console errors are thrown locally without it so I have left this one empty-->
</template>
<script setup>

import {nextTick, onMounted} from 'vue';
import {useNotification} from '@kyvg/vue3-notification';

const props = defineProps({
    title: String,
    text: String,
});

const {notify} = useNotification();

onMounted(async () => {
    await nextTick();

    notify({
        title: props.title,
        text: props.text,
    });
});
</script>

<style>
.vue-notification-template.toast {
    @apply m-2 rounded-md px-6 py-5 border-l-8 border-t border-r border-b border-lake bg-white text-base;

    .notification-title {
        @apply font-semibold text-lake mb-2;
    }
}
</style>
