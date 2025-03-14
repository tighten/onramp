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

        <tabs
            :tabs="filteredTabs"
            :darkMode="false"
            :hide-tabs-on-desktop="true"
            :selectedTab="selectedTab"
            class="mt-10"
            @update:selectedTab="selectedTab = $event"
        />

        <tab
            v-for="(tab, index) in filteredTabs"
            :ref="(el) => (tabRefs[tab.name.toLowerCase()] = el)"
            :key="tab.name"
            :name="capitalize(tab.name)"
            :selected="selectedTab === tab.name"
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
                    <template v-if="tab.name === 'Beginner'">
                        <p
                            v-if="!beginnerModules.length"
                            class="px-3 text-steel"
                        >
                            There are currently no modules here. Check back
                            soon.
                        </p>
                        <ModuleCard
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
                    </template>

                    <template v-else-if="tab.name === 'Intermediate'">
                        <p
                            v-if="!intermediateModules.length"
                            class="px-3 text-steel"
                        >
                            There are currently no modules here. Check back
                            soon.
                        </p>
                        <ModuleCard
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
                    </template>

                    <template v-else-if="tab.name === 'Advanced'">
                        <p
                            v-if="!advancedModules.length"
                            class="px-3 text-steel"
                        >
                            There are currently no modules here. Check back
                            soon.
                        </p>
                        <ModuleCard
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
                    </template>

                    <template v-else-if="tab.name === 'Bonus'">
                        <ModuleCard
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
                    </template>
                </div>
            </div>
        </tab>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import ModuleCard from './ModuleCard.vue';
import Tabs from '../Tabs/Tabs.vue';
import Tab from '../Tabs/Tab.vue';

const props = defineProps({
    standardModules: Array,
    bonusModules: Array,
    userModules: Array,
    completedModules: Array,
    userResourceCompletions: Array,
    userLoggedIn: Boolean,
});

const tabRefs = ref({});
const showAllModules = ref(!props.userLoggedIn);

const tabs = ref([
    { name: 'Beginner', selected: true },
    { name: 'Intermediate', selected: false },
    { name: 'Advanced', selected: false },
    { name: 'Bonus', selected: false },
]);

const selectedTab = ref(tabs.value[0].name);

const beginnerModules = computed(() => filterStandardModules('beginner'));
const intermediateModules = computed(() =>
    filterStandardModules('intermediate')
);
const advancedModules = computed(() => filterStandardModules('advanced'));
const currentBonusModules = ref(filterBonusModules());

const filteredTabs = computed(() => {
    const activeTabs = tabs.value.filter((tab) => {
        if (!currentBonusModules.value.length && tab.name === 'Bonus') {
            return false;
        }
        return true;
    });

    return activeTabs;
});

function capitalize(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}

function filterStandardModules(skillLevel) {
    const { userLoggedIn, standardModules, userModules } = props;
    const modulesByLevel = standardModules.filter(
        (x) => x.skill_level.toLowerCase() === skillLevel.toLowerCase()
    );

    if (!userLoggedIn) {
        return modulesByLevel;
    }

    if (showAllModules.value) {
        const user = modulesByLevel.filter((x) => userModules.includes(x.id));
        const nonUser = modulesByLevel.filter(
            (x) => !userModules.includes(x.id)
        );
        return [...user, ...nonUser];
    }

    return modulesByLevel.filter((x) => userModules.includes(x.id));
}

function filterBonusModules() {
    const { userLoggedIn, bonusModules, userModules } = props;

    if (!userLoggedIn) {
        return bonusModules;
    }

    if (showAllModules.value) {
        const user = bonusModules.filter(({ id }) => userModules.includes(id));
        const nonUser = bonusModules.filter(
            ({ id }) => !userModules.includes(id)
        );
        return [...user, ...nonUser];
    }

    return bonusModules.filter(({ id }) => userModules.includes(id));
}

function toggleShowAllModules() {
    showAllModules.value = !showAllModules.value;

    currentBonusModules.value = filterBonusModules();

    if (!filteredTabs.value.find((tab) => tab.name === selectedTab.value)) {
        selectedTab.value = filteredTabs.value[0]?.name ?? null;
    }
}

function getModuleCompletedResources({ resources_for_current_session }) {
    if (!props.userLoggedIn) return 0;

    const completedResources = props.userResourceCompletions.map((x) =>
        parseInt(x, 10)
    );

    return resources_for_current_session.filter(({ id }) =>
        completedResources.includes(id)
    ).length;
}

function getModuleIsCompleted({ id }) {
    const completedModules = props.completedModules.map((x) => parseInt(x, 10));
    return completedModules.includes(id);
}

function moduleHasNewResources({ resources_for_current_session }) {
    if (!props.userLoggedIn) return false;

    return resources_for_current_session.some((resource) => resource.is_new);
}
</script>
