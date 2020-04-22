<template>
    <div>
        <slot name="tabs-navigation">
            <div class="h-16 w-full mb-8 overflow-hidden md:mb-10 lg:mb-12">
                <div class="fluid-container overflow-scroll pb-8">
                    <ul class="inline-flex flex-no-wrap min-w-full text-none border-b-4 text-regent-grey">
                        <li
                            v-for="(tab, i) in tabs"
                            :key="i"
                            :class="{'text-gray-700': tab.isActive}"
                            class="inline-block pr-5 last:pr-0 font-semibold leading-tight tracking-tight whitespace-no-wrap text-xl duration-150 transition ease-in-out sm:pr-10 lg:pr-20 md:text-2xl xl:text-4xl focus:outline-none hover:text-gray-700"
                        >
                            <a
                                :href="tab.href"
                                @click="setActiveTab(tab.href)"
                                :class="{'border-b-4 border-teal-600': tab.isActive}"
                                class="inline-block -mb-1 pb-5 border-b-4 hover:no-underline"
                            >
                                <span>{{ tab.name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
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
