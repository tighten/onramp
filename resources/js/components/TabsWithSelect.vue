<template>
    <tabs ref="tabs">
        <div slot="tabs-navigation">
            <select-dropdown
                class="mb-8"
                :options="selectOptions"
                @selectChanged="setActiveTabUsingOption">
            </select-dropdown>
        </div>

        <slot></slot>
    </tabs>
</template>

<script>
import SelectDropdown from './SelectDropdown.vue';
import Tabs from './Tabs.vue';

export default {
    props: {
        selectOptions: Array,
    },

    components: {
        'select-dropdown': SelectDropdown,
        'tabs': Tabs,
    },

    methods: {
        setActiveTabUsingOption(option) {
            let href = `#${option.toLowerCase().replace(/ /g, '-')}`;
            this.$refs.tabs.setActiveTab(href);
        }
    },
}
</script>
