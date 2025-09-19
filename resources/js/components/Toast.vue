<template>
    <!--    The toast library does not require a template tag to be present. However, console errors are thrown locally without it so I have left this one empty-->
</template>
<script setup>
import { nextTick, onMounted } from 'vue';
import { useNotification } from '@kyvg/vue3-notification';

const props = defineProps({
    title: String,
    text: String,
});

const { notify } = useNotification();

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
    @apply m-2 rounded-md border-b border-l-8 border-r border-t border-lake bg-white px-6 py-5 text-base;

    .notification-title {
        @apply mb-2 font-semibold text-lake;
    }
}
</style>
