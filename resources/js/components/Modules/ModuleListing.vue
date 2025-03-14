<template>
    <div>
        <div
            class="grid w-full grid-cols-12 px-4 space-y-4 md:space-y-0 lg:mt-18 md:px-8 lg:px-20 2xl:px-32"
        >
            <div
                v-if="userLoggedIn"
                class="col-span-12 md:col-span-5 lg:col-span-4"
            >
                <span class="rounded-md shadow-sm">
                    <button
                        type="button"
                        class="w-1/2 p-2 text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-l-md focus:z-10 focus:outline-none focus:shadow-outline-teal"
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                showAllModules,
                        }"
                        @click="toggleShowAllModules"
                    >
                        All Modules
                    </button>

                    <button
                        type="button"
                        class="w-1/2 p-2 -ml-px text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-r-md focus:z-10 focus:outline-none focus:shadow-outline-blue"
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                !showAllModules,
                        }"
                        @click="toggleShowAllModules"
                    >
                        My Modules
                    </button>
                </span>
            </div>
        </div>

        <ModulesMobile
            :filtered-tabs="filteredTabs"
            :selected-tab="selectedTab"
            :beginner-modules="beginnerModules"
            :intermediate-modules="intermediateModules"
            :advanced-modules="advancedModules"
            :current-bonus-modules="currentBonusModules"
            :capitalize="capitalize"
            :toggle-show-all-modules="toggleShowAllModules"
            :tab-refs="tabRefs"
            :user-modules="userModules"
            :user-logged-in="userLoggedIn"
            :get-module-completed-resources="getModuleCompletedResources"
            :get-module-is-completed="getModuleIsCompleted"
            :module-has-new-resources="moduleHasNewResources"
        />
    </div>
</template>

<script setup>
import ModulesMobile from './ModulesMobile.vue';
import useModules from '../../composables/useModules.js';

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
    tabs,
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
</script>
