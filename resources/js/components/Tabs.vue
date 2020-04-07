<template>
    <div>
        <slot name="tabs-navigation">
            <ul>
                <li
                    v-for="(tab, i) in tabs"
                    :key="i"
                    :class="{'is-active': tab.isActive}"
                >
                    <a
                        :href="tab.href"
                        @click="setActiveTab(tab.href)"
                    >
                        <span>{{ tab.name }}</span>
                    </a>
                </li>
            </ul>
        </slot>

        <!-- tab content -->
        <slot></slot>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tabs: [],
        }
    },

    created() {
        this.tabs = this.$children;
    },

    methods: {
        setActiveTab(selectedTabHref) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.href == selectedTabHref);
            });
        },
    }
}
</script>
