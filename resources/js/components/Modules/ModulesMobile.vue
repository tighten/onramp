<!-- ModulesMobile.vue -->
<template>
    <div>
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
                    </template>

                    <template v-else-if="tab.name === 'Intermediate'">
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
                    </template>

                    <template v-else-if="tab.name === 'Advanced'">
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
                    </template>

                    <template v-else-if="tab.name === 'Bonus'">
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
                    </template>
                </div>
            </div>
        </tab>
    </div>
</template>

<script setup>
import ModuleCard from './ModuleCard.vue';
import Tabs from '../Tabs/Tabs.vue';
import Tab from '../Tabs/Tab.vue';

const props = defineProps({
    filteredTabs: Array,
    selectedTab: String,
    beginnerModules: Array,
    intermediateModules: Array,
    advancedModules: Array,
    currentBonusModules: Array,
    capitalize: Function,
    toggleShowAllModules: Function,
    tabRefs: Object,
    userModules: Array,
    userLoggedIn: Boolean,
    getModuleCompletedResources: Function,
    getModuleIsCompleted: Function,
    moduleHasNewResources: Function,
});
</script>
