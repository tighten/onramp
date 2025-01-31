<template>
    <div>
        <div
            class="grid w-full grid-cols-12 px-4 space-y-4 md:space-y-0 lg:mt-18 md:px-8 lg:px-20 2xl:px-32"
        >
            <div
                v-if="props.userLoggedIn"
                class="col-span-12 md:col-span-5 lg:col-span-4"
            >
                <span class="rounded-md shadow-sm">
                    <button
                        type="button"
                        class="w-1/2 p-2 text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-l-md focus:z-10 focus:outline-none focus:shadow-outline-teal"
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                showAllModules === true,
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
                                showAllModules === false,
                        }"
                        @click="toggleShowAllModules"
                    >
                        My Modules
                    </button>
                </span>
            </div>

            <div
                :class="
                    props.userLoggedIn
                        ? 'col-span-12 md:col-span-7 lg:col-span-8 md:pl-6'
                        : 'col-span-12'
                "
            ></div>
        </div>
        <tabs
            class="mt-10"
            ref="tabs"
            :hide-tabs-on-desktop="true"
            @activeTabUpdated="updateSelectedTab"
        >
            <tab
                v-for="(tab, index) in filteredTabs"
                :ref="`tab-${String(tab.name).toLowerCase()}`"
                :key="String(tab.name)"
                :name="capitalize(String(tab.name))"
                :selected="tab.selected"
            >
                <div
                    class="px-2 md:px-8 lg:px-20 2xl:px-32"
                    :class="{ 'lg:mt-32': index > 0 }"
                >
                    <h2
                        class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-steel lg:block"
                    >
                        {{ capitalize(tab.name) }}
                    </h2>

                    <div class="flex flex-wrap w-full">
                        <div v-if="tab.name === 'beginner'">
                            <p
                                v-if="!beginnerModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in beginnerModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </div>

                        <div v-else-if="tab.name === 'intermediate'">
                            <p
                                v-if="!intermediateModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in intermediateModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </div>

                        <div v-else-if="tab.name === 'advanced'">
                            <p
                                v-if="!advancedModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in advancedModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </div>

                        <div v-else-if="tab.name === 'bonus'">
                            <module-card
                                v-for="(mod, index) in currentBonusModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                level="bonus"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </div>
                    </div>
                </div>
            </tab>
        </tabs>
    </div>
</template>

<script setup>
import { ref, shallowRef, computed } from 'vue';
import ModuleCard from './ModuleCard.vue';
import Tabs from '../Tabs/Tabs.vue'; // Move up one level from the Modules directory
import Tab from '../Tabs/Tab.vue';

const props = defineProps({
    standardModules: {
        type: Array,
        default: [],
    },
    bonusModules: {
        type: Array,
        default: [],
    },
    userModules: {
        type: Array,
        default: [],
    },
    completedModules: {
        type: Array,
        default: [],
    },
    userResourceCompletions: {
        type: Array,
        default: [],
    },
    userLoggedIn: {
        type: Boolean,
        default: false,
    },
});

const tabs = ref([
    { name: 'beginner', selected: true },
    { name: 'intermediate', selected: false },
    { name: 'advanced', selected: false },
    { name: 'bonus', selected: false },
]);

const showAllModules = shallowRef(!props.userLoggedIn);
const currentBonusModules = shallowRef(filterBonusModules());
const allModules = computed(() => [
    ...props.standardModules,
    ...props.bonusModules,
]);
console.log(allModules.value);
// Tabs logic

const filteredTabs = computed(() => {
    if (Array.isArray(tabs.value)) {
        return currentBonusModules.length
            ? tabs.value
            : tabs.value.filter((tab) => tab.name !== 'bonus');
    }
    return []; // Fallback in case tabs.value is not an array
});

// Computed Modules
const beginnerModules = computed(() => filterStandardModules('beginner'));
const intermediateModules = computed(() =>
    filterStandardModules('intermediate')
);
const advancedModules = computed(() => filterStandardModules('advanced'));
const myModules = computed(() => [
    ...filterStandardModules('beginner'),
    ...filterStandardModules('intermediate'),
    ...filterStandardModules('advanced'),
]);

function changeRoute(e) {
    window.location.href = `/${Vue.prototype.trans.getLocale()}/modules/${
        e.slug
    }/free-resources`;
}

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

function filterStandardModules(skillLevel) {
    if (!props.userLoggedIn) {
        return props.standardModules.filter(
            (x) => x.skill_level === skillLevel
        );
    }

    let modules = props.standardModules.filter(
        (x) => x.skill_level === skillLevel
    );
    if (showAllModules.value) {
        const userModulesList = modules.filter((x) =>
            props.userModules.includes(x.id)
        );
        modules = modules.filter((x) => !props.userModules.includes(x.id));
        modules.unshift(...userModulesList);
    } else {
        modules = modules.filter((x) => props.userModules.includes(x.id));
    }
    return modules;
}

function filterBonusModules() {
    if (!props.userLoggedIn) return props.bonusModules;
    if (showAllModules) {
        let modules = props.bonusModules.filter(
            ({ id }) => !props.userModules.includes(id)
        );
        let userModulesList = props.bonusModules.filter(({ id }) =>
            props.userModules.includes(id)
        );
        modules.unshift(...userModulesList);
        return modules;
    }
    return props.bonusModules.filter(({ id }) =>
        props.userModules.includes(id)
    );
}

function toggleShowAllModules() {
    showAllModules.value = !showAllModules.value;
    currentBonusModules.value = filterBonusModules();
}

function getModuleCompletedResources({ resources_for_current_session }) {
    if (!props.userLoggedIn) return 0;
    let userResourceCompletionsList = props.userResourceCompletions.map((x) =>
        parseInt(x)
    );
    return resources_for_current_session.filter(({ id }) =>
        userResourceCompletionsList.includes(id)
    ).length;
}

function getModuleIsCompleted({ id }) {
    let completedModulesList = props.completedModules.map((x) => parseInt(x));
    return completedModulesList.includes(id);
}

function updateSelectedTab(newTab) {
    tabs.forEach((tab) =>
        tab.name === newTab.name.toLowerCase()
            ? (tab.selected = true)
            : (tab.selected = false)
    );
}

function moduleHasNewResources({ resources_for_current_session }) {
    if (!props.userLoggedIn) return false;
    return resources_for_current_session.some((resource) => resource.is_new);
}
</script>
