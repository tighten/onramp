<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script setup>
import {computed, inject, onMounted, onUnmounted} from 'vue';

const {url, name, selected} = defineProps({
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
    if (!tabsContext) return selected;

    if (tabsContext.isDesktop?.value) {
        return true;
    }

    return tabsContext.activeTabName.value === name;
});

onMounted(() => {
    if (tabsContext) {
        const href = url || `#${name.toLowerCase().replace(/ /g, '-')}`;
        tabsContext.registerTab({
            name: name,
            href,
            selected: selected,
            hasUrl: !!url
        });
    }
});

onUnmounted(() => {
    if (tabsContext) {
        tabsContext.unregisterTab(name);
    }
});
</script>
