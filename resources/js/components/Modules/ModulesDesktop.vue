<template>
    <div class="mt-12">
        <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mb-24">
            <h2
                class="w-full mb-8 text-4xl font-semibold leading-tight tracking-tight text-steel"
            >
                Beginner
            </h2>
            <div class="flex flex-wrap w-full">
                <BeginnerCard
                    :beginner-modules="beginnerModules"
                    :user-modules="userModules"
                    :user-logged-in="userLoggedIn"
                    :get-module-completed-resources="
                        getModuleCompletedResources
                    "
                    :get-module-is-completed="getModuleIsCompleted"
                    :module-has-new-resources="moduleHasNewResources"
                />
            </div>
        </div>

        <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mb-24">
            <h2
                class="w-full mb-8 text-4xl font-semibold leading-tight tracking-tight text-steel"
            >
                Intermediate
            </h2>
            <div class="flex flex-wrap w-full">
                <IntermediateCard
                    :intermediate-modules="intermediateModules"
                    :user-modules="userModules"
                    :user-logged-in="userLoggedIn"
                    :get-module-completed-resources="
                        getModuleCompletedResources
                    "
                    :get-module-is-completed="getModuleIsCompleted"
                    :module-has-new-resources="moduleHasNewResources"
                />
            </div>
        </div>

        <div class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mb-24">
            <h2
                class="w-full mb-8 text-4xl font-semibold leading-tight tracking-tight text-steel"
            >
                Advanced
            </h2>
            <div class="flex flex-wrap w-full">
                <AdvancedCard
                    :advanced-modules="advancedModules"
                    :user-modules="userModules"
                    :user-logged-in="userLoggedIn"
                    :get-module-completed-resources="
                        getModuleCompletedResources
                    "
                    :get-module-is-completed="getModuleIsCompleted"
                    :module-has-new-resources="moduleHasNewResources"
                />
            </div>
        </div>

        <div
            v-if="currentBonusModules.length"
            class="px-2 md:px-8 lg:px-20 2xl:px-32 lg:mb-24"
        >
            <h2
                class="w-full mb-8 text-4xl font-semibold leading-tight tracking-tight text-steel"
            >
                Bonus
            </h2>
            <div class="flex flex-wrap w-full">
                <BonusCard
                    :current-bonus-modules="currentBonusModules"
                    :user-modules="userModules"
                    :user-logged-in="userLoggedIn"
                    :get-module-completed-resources="
                        getModuleCompletedResources
                    "
                    :get-module-is-completed="getModuleIsCompleted"
                    :module-has-new-resources="moduleHasNewResources"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import BeginnerCard from './BeginnerCard.vue';
import IntermediateCard from './IntermediateCard.vue';
import AdvancedCard from './AdvancedCard.vue';
import BonusCard from './BonusCard.vue';

const props = defineProps({
    beginnerModules: Array,
    intermediateModules: Array,
    advancedModules: Array,
    currentBonusModules: Array,
    userModules: Array,
    userLoggedIn: Boolean,
    showAllModules: Boolean,
    toggleShowAllModules: Function,
    getModuleCompletedResources: Function,
    getModuleIsCompleted: Function,
    moduleHasNewResources: Function,
});
</script>
