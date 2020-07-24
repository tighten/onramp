<template>
    <div>
        <slot name="tabs-navigation">
            <div class="w-full h-16 mb-8 overflow-hidden md:mb-10 lg:mb-12"
                :class="{'lg:hidden': hideTabsOnDesktop}"
            >
                <div class="pb-8 overflow-scroll fluid-container">
                    <ul class="inline-flex flex-no-wrap min-w-full border-b-4 text-none text-regent-grey">
                        <li
                            v-for="tab in tabs"
                            :key="tab.name"
                            :class="{'text-gray-700': tab.isActive}"
                            class="inline-block pr-5 text-xl font-semibold leading-tight tracking-tight whitespace-no-wrap transition duration-150 ease-in-out last:pr-0 sm:pr-10 lg:pr-20 md:text-2xl xl:text-4xl focus:outline-none hover:text-gray-700"
                        >
                            <a
                                :href="tab.href"
                                :class="{'border-b-4 border-teal-700': tab.isActive}"
                                class="inline-block pb-5 -mb-1 border-b-4 hover:no-underline"
                                @click="setActiveTab(tab.href)"
                            >
                                <span>{{ tab.name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </slot>

        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        hideTabsOnDesktop: {
            type: Boolean,
            default: false,
        }
    },

    data() {
        return {
            tabs: [],
            windowWidth: window.innerWidth,
        }
    },

    created() {
        this.tabs = this.$children;
    },

    mounted() {
        this.$nextTick(() => {
            this.checkShowAllTabContent();
            window.addEventListener('resize', this.checkShowAllTabContent);
        });
    },

    destroyed() {
        window.removeEventListener('resize', this.checkShowAllTabContent);
    },

    watch: {
        tabs(value) {
            this.checkShowAllTabContent();
        },
    },

    methods: {
        setActiveTab(selectedTabHref) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.href == selectedTabHref);
            });

            this.$emit('activeTabUpdated', this.tabs.filter(tab => tab.isActive)[0]);
        },

        showAllTabs() {
            this.tabs.forEach(tab => {
                tab.isActive = true;
            });
        },

        checkShowAllTabContent() {
            if (! this.hideTabsOnDesktop) {
                return;
            }

            if (window.innerWidth >= 992) {
                this.showAllTabs();
                return;
            }
            
            if (window.innerWidth < 992) {
                if(this.windowWidth === window.innerWidth) {
                    return;
                }

                this.setActiveTab(this.tabs[0].href);
                this.windowWidth = window.innerWidth;
            }
        },
    },
}
</script>
