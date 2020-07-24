<template>
    <div>
        <div
            v-if="userLoggedIn"
            class="px-4 mt-12 text-center sm:text-right lg:mt-18 fluid-container md:px-12 xl:px-20 xxl:px-32"
        >
            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                <button
                    type="button"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-l-md hover:text-gray-600 focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700"
                    :class="{'pointer-events-none bg-gray-200 shadow-inner transition-none': showAllModules === true}"
                    @click="toggleShowAllModules"
                >All Modules</button>

                <button
                    type="button"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-r-md hover:text-gray-600 focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700"
                    :class="{'pointer-events-none bg-gray-200 shadow-inner transition-none': showAllModules === false}"
                    @click="toggleShowAllModules"
                >My Modules</button>
            </span>
        </div>

        <tabs 
            class="mt-12 lg:mt-18"
            ref="tabs"
            :hide-tabs-on-desktop="true"
            @activeTabUpdated="updateSelectedTab"
        >
            <tab
                v-for="(tab, index) in filteredTabs"
                :ref="`tab-${tab.name.toLowerCase()}`"
                :key="tab.name"
                :name="tab.name | capitalize"
                :selected="tab.selected"
            >
                <div
                    class="px-2 fluid-container md:px-8 lg:px-20 xxl:px-32"
                    :class="{'lg:mt-32': index > 0}"
                >
                    <h2
                        class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-gray-900 lg:block"
                    >{{ tab.name | capitalize }}</h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        <template v-if="tab.name === 'beginner'">
                            <p
                                v-if="! beginnerModules.length"
                                class="px-3 text-gray-700"
                            >There are currently no modules here. Check back soon.</p>

                            <module-card
                                v-else
                                v-for="(mod, index) in beginnerModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="getModuleCompletedResources(mod)"
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'intermediate'">
                            <p
                                v-if="! intermediateModules.length"
                                class="px-3 text-gray-700"
                            >There are currently no modules here. Check back soon.</p>

                            <module-card
                                v-else
                                v-for="(mod, index) in intermediateModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="getModuleCompletedResources(mod)"
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'advanced'">
                            <p
                                v-if="! advancedModules.length"
                                class="px-3 text-gray-700"
                            >There are currently no modules here. Check back soon.</p>

                            <module-card
                                v-else
                                v-for="(mod, index) in advancedModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="getModuleCompletedResources(mod)"
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'bonus'">
                            <module-card
                                v-for="(mod, index) in currentBonusModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                level="bonus"
                                :completed-resources-count="getModuleCompletedResources(mod)"
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                            />
                        </template>
                    </div>
                </div>
            </tab>
        </tabs>
    </div>
</template>

<script>
export default {
    props: {
        standardModules: {
            type: Array,
            default: [],
        },
        bonusModules: {
            type: Array,
            default: [],
        },
        userModules: {
            type: Array,
            default: [],
        },
        completedModules: {
            type: Array,
            default: [],
        },
        userResourceCompletions: {
            type: Array,
            default: [],
        },
        userLoggedIn: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {
            tabs: [
                {
                    name: "beginner",
                    selected: true
                },
                {
                    name: "intermediate",
                    selected: false
                },
                {
                    name: "advanced",
                    selected: false
                },
                {
                    name: "bonus",
                    selected: false
                }
            ],
            showAllModules: !this.userLoggedIn,
            currentBonusModules: this.filterBonusModules(),
        };
    },

    computed: {
        beginnerModules() {
            return this.filterStandardModules("beginner");
        },

        intermediateModules() {
            return this.filterStandardModules("intermediate");
        },

        advancedModules() {
            return this.filterStandardModules("advanced");
        },

        filteredTabs() {
            if (! this.currentBonusModules.length) {
                return this.tabs.filter(tab => tab.name !== "bonus");
            }

            return this.tabs;
        },
    },

    methods: {
        filterStandardModules(skillLevel) {
            if (! this.userLoggedIn) {
                return this.standardModules.filter(
                    x => x.skill_level === skillLevel
                );
            }

            if (this.userLoggedIn && this.showAllModules) {
                let modules = this.standardModules.filter(
                    x => x.skill_level === skillLevel
                );

                let userModules = modules.filter(x =>
                    this.userModules.includes(x.id)
                );

                modules = modules.filter(x =>
                    ! this.userModules.includes(x.id)
                );

                modules.unshift(...userModules);

                return modules;
            }

            return this.standardModules.filter(x => {
                return (
                    x.skill_level === skillLevel &&
                    this.userModules.includes(x.id)
                );
            });
        },

        filterBonusModules() {
            if (! this.userLoggedIn) {
                return this.bonusModules;
            }

            if (this.userLoggedIn && this.showAllModules) {
                let userModules = this.bonusModules.filter(({ id }) =>
                    this.userModules.includes(id)
                );

                let modules = this.bonusModules.filter(({ id }) =>
                    ! this.userModules.includes(id)
                );

                modules.unshift(...userModules);

                return modules;
            }

            return this.bonusModules.filter(({ id }) =>
                this.userModules.includes(id)
            );
        },

        toggleShowAllModules() {
            this.showAllModules = !this.showAllModules;
            this.currentBonusModules = this.filterBonusModules();
            this.filterStandardModules("beginner");
            this.filterStandardModules("intermediate");
            this.filterStandardModules("advanced");

            let activeTab = this.tabs.filter(tab => tab.selected)[0];

            if(! this.filteredTabs.includes(activeTab)) {
                this.$refs.tabs.setActiveTab(
                    this.$refs[`tab-${this.tabs[0].name.toLowerCase()}`][0].href
                );
            }
        },

        getModuleCompletedResources({ resources_for_current_session }) {
            if (! this.userLoggedIn) {
                return 0;
            }

            let userResourceCompletions = this.userResourceCompletions.map(x => parseInt(x));

            return resources_for_current_session.filter(({ id }) => {
                return userResourceCompletions.includes(id);
            }).length;
        },

        getModuleIsCompleted({ id }) {
            let completedModules = this.completedModules.map(x => parseInt(x));
            return completedModules.includes(id);
        },

        updateSelectedTab(newTab) {
            this.tabs.map(tab => {
                tab.name === newTab.name.toLowerCase() ? tab.selected = true : tab.selected = false;
            });
        },
    },
};
</script>
