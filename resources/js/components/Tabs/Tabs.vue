<template>
    <div>
        <!-- Slot for custom navigation if needed -->
        <slot name="tabs-navigation">
            <!-- Mobile Tabs Navigation -->
            <div
                class="w-full h-16 mb-4 overflow-hidden md:mb-10 lg:mb-12"
                :class="{ 'lg:hidden': hideTabsOnDesktop }"
            >
                <div class="pb-6 overflow-scroll">
                    <ul
                        class="inline-flex flex-no-wrap min-w-full border-b-4 text-none border-gray"
                    >
                        <li
                            v-for="tab in localTabs"
                            :key="tab.name"
                            :class="[
                                darkMode ? 'text-white' : 'text-gray',
                                {
                                    'text-gray-black':
                                        tab.isActive && !darkMode,
                                },
                            ]"
                            class="inline-block text-xl font-semibold leading-tight tracking-tight whitespace-no-wrap transition duration-200 ease-in-out md:text-2xl xl:text-4xl focus:outline-none"
                        >
                            <a
                                :href="tab.href"
                                :class="{
                                    'border-b-4 border-teal': tab.isActive,
                                }"
                                class="inline-block pb-5 -mb-1 border-b-4 hover:no-underline whitespace-nowrap"
                                @click.prevent="setActiveTab(tab.name)"
                            >
                                <span class="px-4">{{ tab.name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </slot>

        <!-- Default slot for tab content -->
        <slot></slot>
    </div>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue';

// Props
const props = defineProps({
    hideTabsOnDesktop: {
        type: Boolean,
        default: false,
    },
    darkMode: {
        type: Boolean,
        default: false,
    },
    tabs: {
        type: Array,
        default: () => [],
    },
    selectedTab: {
        type: String,
        default: '',
    },
});

// Emits
const emit = defineEmits(['update:selectedTab', 'activeTabUpdated']);

// Local state
const localTabs = ref([]);
const windowWidth = ref(window.innerWidth);

// Normalize tabs to ensure consistent structure
function normalizeTabs(tabs, selected) {
    return tabs.map((tab) => {
        const name = typeof tab === 'string' ? tab : tab.name;
        const url = typeof tab === 'object' && tab.url ? tab.url : '';
        const href = url || `#${name.toLowerCase().replace(/ /g, '-')}`;

        return {
            name,
            href,
            isActive: selected ? name === selected : false,
        };
    });
}

// Set active tab by name
// Set active tab by name
function setActiveTab(tabName) {
    if (!tabName) {
        console.warn('setActiveTab received an invalid tabName:', tabName);
        return;
    }

    localTabs.value = localTabs.value.map((tab) => ({
        ...tab,
        isActive: tab.name === tabName,
    }));

    const activeTab = localTabs.value.find((tab) => tab.isActive);

    if (!activeTab) {
        console.warn('No active tab found after setting activeTab', tabName);
        return;
    }

    // Emit active tab back to parent for syncing
    emit('update:selectedTab', activeTab.name);
}

// Show all tabs (for desktop)
function showAllTabs() {
    localTabs.value = localTabs.value.map((tab) => ({
        ...tab,
        isActive: true,
    }));
}

// Handle showing all tab content based on window size
function checkShowAllTabContent() {
    if (!props.hideTabsOnDesktop) return;

    const isDesktop = window.innerWidth >= 992;

    if (isDesktop) {
        showAllTabs();
    } else {
        if (windowWidth.value !== window.innerWidth) {
            setActiveTab(localTabs.value[0]?.name);
            windowWidth.value = window.innerWidth;
        }
    }
}

// Debounce utility for resize event
let resizeTimeout;
function handleResize() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(checkShowAllTabContent, 150);
}

// Lifecycle hooks
onMounted(() => {
    localTabs.value = normalizeTabs(
        props.tabs,
        props.selectedTab || props.tabs[0]?.name
    );

    if (!props.selectedTab) {
        emit('update:selectedTab', localTabs.value[0]?.name);
    }

    checkShowAllTabContent();
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
    clearTimeout(resizeTimeout);
});

// Watchers
watch(
    () => props.tabs,
    (newTabs) => {
        localTabs.value = normalizeTabs(newTabs, props.selectedTab);
        checkShowAllTabContent();
    },
    { deep: true }
);

watch(
    () => props.selectedTab,
    (newSelected) => {
        if (newSelected) {
            setActiveTab(newSelected);
        }
    }
);
</script>
