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

            <!-- <div
                :class="
                    userLoggedIn
                        ? 'col-span-12 md:col-span-7 lg:col-span-8 md:pl-6'
                        : 'col-span-12'
                "
            >
                <v-select
                    :filter="fuseSearch"
                    :options="showAllModules ? allModules : myModules"
                    @input="changeRoute($event)"
                    :get-option-label="(option) => option.slug"
                    :components="{ Deselect }"
                    :placeholder="`Search ${
                        showAllModules ? 'All' : 'My'
                    } Modules`"
                >
                    <template #option="{ id, slug, name }">
                        {{ name['en'] }}
                    </template>
                </v-select>
            </div> -->
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
            @update:selectedTab="selectedTab = $event"
            class="lg:hidden"
        />

        <ModulesDesktop
            :beginner-modules="beginnerModules"
            :intermediate-modules="intermediateModules"
            :advanced-modules="advancedModules"
            :current-bonus-modules="currentBonusModules"
            :user-modules="userModules"
            :user-logged-in="userLoggedIn"
            :get-module-completed-resources="getModuleCompletedResources"
            :get-module-is-completed="getModuleIsCompleted"
            :module-has-new-resources="moduleHasNewResources"
            class="hidden lg:block"
        />
    </div>
</template>

<script setup>
import ModulesMobile from './ModulesMobile.vue';
import ModulesDesktop from './ModulesDesktop.vue';
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

// Search functionality (for desktop search bar)
// const allModules = computed(() => {
//     return props.standardModules.concat(props.bonusModules);
// });

// const myModules = computed(() => {
//     return [
//         ...beginnerModules.value,
//         ...intermediateModules.value,
//         ...advancedModules.value,
//     ];
// });

// // Deselect component for v-select
// const Deselect = {
//     render: (createElement) => createElement('span', ''),
// };

// const fuseSearch = (options, search) => {
//     let locale = 'name.en'; // Adjust based on your locale setup

//     const fuse = new Fuse(options, {
//         keys: [locale, 'slug', 'id'],
//         shouldSort: true,
//     });

//     return search.length
//         ? fuse.search(search).map(({ item }) => item)
//         : fuse.list;
// };

// const changeRoute = (e) => {
//     window.location.href = `/modules/${e.slug}/free-resources`;
// };
</script>
