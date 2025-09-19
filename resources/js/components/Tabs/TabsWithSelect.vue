<template>
    <tabs ref="tabs">
        <template #tabs-navigation>
            <SelectDropdown
                :options="selectOptions"
                class="mb-8"
                @selectChanged="setActiveTabUsingOption"
            />
        </template>

        <slot></slot>
    </tabs>
</template>

<script setup>
import {ref} from 'vue';
import SelectDropdown from '../SelectDropdown.vue';
import Tabs from './Tabs.vue';

defineProps({
    selectOptions: Array,
});

const tabs = ref(null);

function setActiveTabUsingOption(option) {
    tabs.value.setActiveTab(option);
}
</script>
