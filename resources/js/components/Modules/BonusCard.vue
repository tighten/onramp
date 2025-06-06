<template>
    <p v-if="!currentBonusModules.length" class="px-3 text-steel">
        There are currently no modules here. Check back soon.
    </p>
    <ModuleCard
        v-else
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
</template>

<script setup>
import ModuleCard from './ModuleCard.vue';

const props = defineProps({
    currentBonusModules: Array,
    userModules: Array,
    userLoggedIn: Boolean,
    getModuleCompletedResources: Function,
    getModuleIsCompleted: Function,
    moduleHasNewResources: Function,
});
</script>
