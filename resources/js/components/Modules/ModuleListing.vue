<template>
    <div>
        <!-- Search and Filter Controls -->
        <div
            class="grid w-full grid-cols-12 px-4 space-y-4 md:space-y-0 lg:mt-18 md:px-8 lg:px-20 2xl:px-32"
        >
            <div
                v-if="userLoggedIn"
                class="col-span-12 md:col-span-5 lg:col-span-4"
            >
                <span class="rounded-md shadow-sm">
                    <button
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                showAllModules,
                        }"
                        class="w-1/2 p-2 text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-l-md focus:z-10 focus:outline-none focus:shadow-outline-teal"
                        type="button"
                        @click="toggleShowAllModules"
                    >
                        All Modules
                    </button>

                    <button
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                !showAllModules,
                        }"
                        class="w-1/2 p-2 -ml-px text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-r-md focus:z-10 focus:outline-none focus:shadow-outline-blue"
                        type="button"
                        @click="toggleShowAllModules"
                    >
                        My Modules
                    </button>
                </span>
            </div>

            <div
                :class="
                    userLoggedIn
                        ? 'col-span-12 md:col-span-7 lg:col-span-8 md:pl-6'
                        : 'col-span-12'
                "
            >
                <VueSelect
                    :filter="fuseSearch"
                    :get-option-label="(option) => option.slug"
                    :options="showAllModules ? allModules : myModules"
                    :placeholder="`Search ${showAllModules ? 'All' : 'My'} Modules`"
                    @update:modelValue="changeRoute"
                >
                    <template #option="{ id, slug, name }">
                        {{ name['en'] }}
                    </template>
                </VueSelect>
            </div>
        </div>

        <ModulesMobile
            :advanced-modules="advancedModules"
            :beginner-modules="beginnerModules"
            :capitalize="capitalize"
            :current-bonus-modules="currentBonusModules"
            :filtered-tabs="filteredTabs"
            :get-module-completed-resources="getModuleCompletedResources"
            :get-module-is-completed="getModuleIsCompleted"
            :intermediate-modules="intermediateModules"
            :module-has-new-resources="moduleHasNewResources"
            :selected-tab="selectedTab"
            :tab-refs="tabRefs"
            :toggle-show-all-modules="toggleShowAllModules"
            :user-logged-in="userLoggedIn"
            :user-modules="userModules"
            class="lg:hidden"
            @update:selectedTab="selectedTab = $event"
        />

        <ModulesDesktop
            :advanced-modules="advancedModules"
            :beginner-modules="beginnerModules"
            :current-bonus-modules="currentBonusModules"
            :get-module-completed-resources="getModuleCompletedResources"
            :get-module-is-completed="getModuleIsCompleted"
            :intermediate-modules="intermediateModules"
            :module-has-new-resources="moduleHasNewResources"
            :user-logged-in="userLoggedIn"
            :user-modules="userModules"
            class="hidden lg:block"
        />
    </div>
</template>

<script setup>
import ModulesMobile from './ModulesMobile.vue';
import ModulesDesktop from './ModulesDesktop.vue';
import useModules from '../../composables/useModules.js';
import VueSelect from 'vue-select';
import Fuse from "fuse.js";
import {computed} from 'vue';

defineExpose({'vue-select': VueSelect});

const props = defineProps({
    standardModules: Array,
    bonusModules: Array,
    userModules: Array,
    completedModules: Array,
    userResourceCompletions: Array,
    userLoggedIn: Boolean,
});

const {
    tabRefs,
    showAllModules,
    selectedTab,
    currentBonusModules,
    beginnerModules,
    intermediateModules,
    advancedModules,
    filteredTabs,
    capitalize,
    toggleShowAllModules,
    getModuleCompletedResources,
    getModuleIsCompleted,
    moduleHasNewResources,
} = useModules(props);

// Search functionality (for desktop search bar)
const allModules = computed(() => {
    return props.standardModules.concat(props.bonusModules);
});

const myModules = computed(() => {
    return [
        ...beginnerModules.value,
        ...intermediateModules.value,
        ...advancedModules.value,
    ];
});

const fuseSearch = (options, search) => {
    let locale = 'name.en'; // Adjust based on your locale setup

    const fuse = new Fuse(options, {
        keys: [locale, 'slug', 'id'],
        shouldSort: true,
    });

    return search.length
        ? fuse.search(search).map(({item}) => item)
        : fuse.list;
};

const changeRoute = (selected) => {
    if (selected && selected.slug) {
        const locale = window.location.pathname.split('/')[1] || 'en';
        window.location.href = `/${locale}/modules/${selected.slug}/free-resources`;
    }
};

</script>
<style>
@import "vue-select/dist/vue-select.css";
</style>
