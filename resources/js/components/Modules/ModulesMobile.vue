<template>
    <div>
        <Tabs
            v-model="internalSelectedTab"
            :darkMode="false"
            :hide-tabs-on-desktop="true"
            class="mt-10"
        >
            <Tab
                name="Beginner"
                :selected="internalSelectedTab === 'Beginner'"
            >
                <div class="px-2 md:px-8 lg:px-20 2xl:px-32">
                    <h2 class="mb-10 hidden w-full text-4xl font-semibold leading-tight tracking-tight text-steel lg:block">
                        {{ capitalize('Beginner') }}
                    </h2>
                    <div class="flex w-full flex-wrap">
                        <p v-if="!beginnerModules.length" class="px-3 text-steel">
                            There are currently no modules here. Check back soon.
                        </p>
                        <ModuleCard
                            v-else
                            v-for="(mod, index) in beginnerModules"
                            :key="mod.id"
                            :item="mod"
                            :card-is-even="index % 2 === 0"
                            :level="mod.skill_level"
                            :completed-resources-count="getModuleCompletedResources(mod)"
                            :is-user-module="userModules.includes(mod.id)"
                            :is-completed="getModuleIsCompleted(mod)"
                            :has-new-content="moduleHasNewResources(mod)"
                        />
                    </div>
                </div>
            </Tab>
            <Tab
                name="Intermediate"
                :selected="internalSelectedTab === 'Intermediate'"
            >
                <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mt-32">
                    <h2 class="mb-10 hidden w-full text-4xl font-semibold leading-tight tracking-tight text-steel lg:block">
                        {{ capitalize('Intermediate') }}
                    </h2>
                    <div class="flex w-full flex-wrap">
                        <p v-if="!intermediateModules.length" class="px-3 text-steel">
                            There are currently no modules here. Check back soon.
                        </p>
                        <ModuleCard
                            v-else
                            v-for="(mod, index) in intermediateModules"
                            :key="mod.id"
                            :item="mod"
                            :card-is-even="index % 2 === 0"
                            :level="mod.skill_level"
                            :completed-resources-count="getModuleCompletedResources(mod)"
                            :is-user-module="userModules.includes(mod.id)"
                            :is-completed="getModuleIsCompleted(mod)"
                            :has-new-content="moduleHasNewResources(mod)"
                        />
                    </div>
                </div>
            </Tab>
            <Tab
                name="Advanced"
                :selected="internalSelectedTab === 'Advanced'"
            >
                <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mt-32">
                    <h2 class="mb-10 hidden w-full text-4xl font-semibold leading-tight tracking-tight text-steel lg:block">
                        {{ capitalize('Advanced') }}
                    </h2>
                    <div class="flex w-full flex-wrap">
                        <p v-if="!advancedModules.length" class="px-3 text-steel">
                            There are currently no modules here. Check back soon.
                        </p>
                        <ModuleCard
                            v-else
                            v-for="(mod, index) in advancedModules"
                            :key="mod.id"
                            :item="mod"
                            :card-is-even="index % 2 === 0"
                            :level="mod.skill_level"
                            :completed-resources-count="getModuleCompletedResources(mod)"
                            :is-user-module="userModules.includes(mod.id)"
                            :is-completed="getModuleIsCompleted(mod)"
                            :has-new-content="moduleHasNewResources(mod)"
                        />
                    </div>
                </div>
            </Tab>
            <Tab
                name="Bonus"
                :selected="internalSelectedTab === 'Bonus'"
            >
                <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mt-32">
                    <h2 class="mb-10 hidden w-full text-4xl font-semibold leading-tight tracking-tight text-steel lg:block">
                        {{ capitalize('Bonus') }}
                    </h2>
                    <div class="flex w-full flex-wrap">
                        <ModuleCard
                            v-for="(mod, index) in currentBonusModules"
                            :key="mod.id"
                            :item="mod"
                            :card-is-even="index % 2 === 0"
                            level="bonus"
                            :completed-resources-count="getModuleCompletedResources(mod)"
                            :is-user-module="userModules.includes(mod.id)"
                            :is-completed="getModuleIsCompleted(mod)"
                            :has-new-content="moduleHasNewResources(mod)"
                        />
                    </div>
                </div>
            </Tab>
        </Tabs>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';
    import Tab from '../Tabs/Tab.vue';
    import Tabs from '../Tabs/Tabs.vue';
    import ModuleCard from './ModuleCard.vue';

    const props = defineProps({
        selectedTab: String,
        beginnerModules: Array,
        intermediateModules: Array,
        advancedModules: Array,
        currentBonusModules: Array,
        capitalize: Function,
        userModules: Array,
        userLoggedIn: Boolean,
        getModuleCompletedResources: Function,
        getModuleIsCompleted: Function,
        moduleHasNewResources: Function,
    });

    const emit = defineEmits(['update:selectedTab']);

    const internalSelectedTab = ref(props.selectedTab || 'Beginner');

    watch(() => props.selectedTab, (val) => {
        if (val && val !== internalSelectedTab.value) {
            internalSelectedTab.value = val;
        }
    });

    watch(internalSelectedTab, (val) => {
        emit('update:selectedTab', val);
    });
</script>
