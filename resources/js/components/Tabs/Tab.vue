<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script setup>
import {computed, inject, onMounted, onUnmounted} from 'vue';

const props = defineProps({
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
});

const tabsContext = inject('tabs', null);

if (!tabsContext) {
    console.warn('Tab component must be used within a Tabs component');
}

const isActive = computed(() => {
    if (!tabsContext) return props.selected;

    if (tabsContext.isDesktop?.value) {
        return true;
    }

    return tabsContext.activeTabName.value === props.name;
});

onMounted(() => {
    if (tabsContext) {
        const href = props.url || `#${props.name.toLowerCase().replace(/ /g, '-')}`;
        tabsContext.registerTab({
            name: props.name,
            href,
            selected: props.selected,
            hasUrl: !!props.url
        });
    }
});

onUnmounted(() => {
    if (tabsContext) {
        tabsContext.unregisterTab(props.name);
    }
});
</script>
