<template>
    <tabs ref="tabs">
        <div slot="tabs-navigation">
            <select-dropdown
                class="mb-8"
                :options="selectOptions"
                @selectChanged="setActiveTabUsingOption"
            />
        </div>

        <slot></slot>
    </tabs>
</template>

<script>
export default {
    props: {
        selectOptions: Array,
    },

    methods: {
        setActiveTabUsingOption(option) {
            let href = `#${option.toLowerCase().replace(/ /g, '-')}`;
            this.$refs.tabs.setActiveTab(href);
        }
    },
}
</script>
