<template>
    <div>
        <slot name="tabs-navigation">
            <div
                :class="{ 'lg:hidden': hideTabsOnDesktop }"
                class="w-full h-16 mb-4 overflow-hidden md:mb-10 lg:mb-12"
            >
                <div class="pb-6 overflow-x-scroll">
                    <ul
                        class="inline-flex flex-no-wrap min-w-full border-b-4 text-none border-gray"
                    >
                        <li
                            v-for="tab in registeredTabs"
                            :key="tab.name"
                            :class="[
                                darkMode ? 'text-white' : 'text-gray',
                                {
                                    'text-gray-black':
                                        tab.name === activeTabName && !darkMode,
                                },
                            ]"
                            class="inline-block text-xl font-semibold leading-tight tracking-tight whitespace-no-wrap transition duration-200 ease-in-out md:text-2xl xl:text-4xl focus:outline-none"
                        >
                            <a
                                :class="{
                                    'border-b-4 border-teal': tab.name === activeTabName,
                                }"
                                :href="tab.href"
                                class="inline-block pb-5 -mb-1 border-b-4 hover:no-underline whitespace-nowrap"
                                @click="handleTabClick(tab, $event)"
                            >
                                <span class="px-4">{{ tab.name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </slot>

        <slot></slot>
    </div>
</template>

<script setup>
import {computed, onMounted, onUnmounted, provide, readonly, ref, toRefs} from 'vue';

const props = defineProps({
    hideTabsOnDesktop: {
        type: Boolean,
        default: false,
    },
    darkMode: {
        type: Boolean,
        default: false,
    },
});

const {hideTabsOnDesktop, darkMode} = toRefs(props);

const emit = defineEmits(['activeTabUpdated']);

const registeredTabs = ref([]);
const activeTabName = ref('');
const windowWidth = ref(window.innerWidth);

function registerTab(tab) {
    const existingIndex = registeredTabs.value.findIndex(t => t.name === tab.name);
    if (existingIndex >= 0) {
        registeredTabs.value[existingIndex] = tab;
    } else {
        registeredTabs.value.push(tab);
    }

    if (!activeTabName.value || tab.selected) {
        setActiveTab(tab.name);
    }
}

function unregisterTab(tabName) {
    const index = registeredTabs.value.findIndex(t => t.name === tabName);
    if (index >= 0) {
        registeredTabs.value.splice(index, 1);
    }
}

function setActiveTab(tabName) {
    if (!tabName) {
        console.warn('setActiveTab received an invalid tabName:', tabName);
        return;
    }

    activeTabName.value = tabName;
    emit('activeTabUpdated', tabName);
}

function handleTabClick(tab, event) {
    if (tab.href && !tab.href.startsWith('#')) {
        return;
    }

    event.preventDefault();
    setActiveTab(tab.name);
}

function checkShowAllTabContent() {
    if (!hideTabsOnDesktop.value) return;

    const isDesktop = window.innerWidth >= 992;

    if (!isDesktop) {
        if (windowWidth.value !== window.innerWidth) {
            if (registeredTabs.value.length > 0 && !activeTabName.value) {
                setActiveTab(registeredTabs.value[0].name);
            }
            windowWidth.value = window.innerWidth;
        }
    }
}

let resizeTimeout;

function handleResize() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(checkShowAllTabContent, 150);
}

onMounted(() => {
    checkShowAllTabContent();
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
    clearTimeout(resizeTimeout);
});

provide('tabs', {
    registerTab,
    unregisterTab,
    activeTabName: readonly(activeTabName),
    isDesktop: computed(() => hideTabsOnDesktop.value && window.innerWidth >= 992)
});

defineExpose({
    setActiveTab
});
</script>
