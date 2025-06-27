<template>
    <tabs ref="tabs">
        <div slot="tabs-navigation">
            <SelectDropdown
                :options="selectOptions"
                class="mb-8"
                @selectChanged="setActiveTabUsingOption"
            />
        </div>

        <slot></slot>
    </tabs>
</template>

<script setup>
import {ref} from 'vue';
import SelectDropdown from '../SelectDropdown.vue';

const props = defineProps({
    selectOptions: Array,
});

const tabs = ref(null);

function setActiveTabUsingOption(option) {
    let href = `#${option.toLowerCase().replace(/ /g, '-')}`;
    tabs.value.setActiveTab(href);
}
</script>
