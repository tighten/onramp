<template>
    <div>
        <div
            v-if="userLoggedIn"
            class="px-4 text-center sm:text-right lg:mt-18 fluid-container md:px-12 xl:px-20 2xl:px-32"
        >
            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                <button
                    type="button"
                    class="relative inline-flex items-center p-2 text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 md:px-4 border-silver rounded-l-md focus:z-10 focus:outline-none focus:shadow-outline-teal"
                    :class="{
                        'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                            showAllModules === true
                    }"
                    @click="toggleShowAllModules"
                >
                    All Modules
                </button>

                <button
                    type="button"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-r-md focus:z-10 focus:outline-none focus:shadow-outline-blue"
                    :class="{
                        'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                            showAllModules === false
                    }"
                    @click="toggleShowAllModules"
                >
                    My Modules
                </button>
            </span>
        </div>

        <div class="px-4 lg:mt-18 fluid-container md:px-12 xl:px-20 2xl:px-32 relative flex items-center w-full">
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" v-model="search" class="border border-purple text-gray text-sm rounded-lg block w-full pl-10 p-2.5" placeholder="Search" required>
            </div>
        </div>
        <tabs
            class="mt-10"
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
                    class="px-2 fluid-container md:px-8 lg:px-20 2xl:px-32"
                    :class="{ 'lg:mt-32': index > 0 }"
                >
                    <h2
                        class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-steel lg:block"
                    >
                        {{ tab.name | capitalize }}
                    </h2>

                    <div class="flex flex-wrap w-full md:px-1 lg:px-0 lg:-mx-3">
                        <template v-if="tab.name === 'beginner'">
                            <p
                                v-if="!beginnerModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in beginnerModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'intermediate'">
                            <p
                                v-if="!intermediateModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in intermediateModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'advanced'">
                            <p
                                v-if="!advancedModules.length"
                                class="px-3 text-steel"
                            >
                                There are currently no modules here. Check back
                                soon.
                            </p>

                            <module-card
                                v-else
                                v-for="(mod, index) in advancedModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                :level="mod.skill_level"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
                            />
                        </template>

                        <template v-else-if="tab.name === 'bonus'">
                            <module-card
                                v-for="(mod, index) in currentBonusModules"
                                :key="mod.id"
                                :item="mod"
                                :card-is-even="index % 2 === 0"
                                level="bonus"
                                :completed-resources-count="
                                    getModuleCompletedResources(mod)
                                "
                                :is-user-module="userModules.includes(mod.id)"
                                :is-completed="getModuleIsCompleted(mod)"
                                :has-new-content="moduleHasNewResources(mod)"
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
            default: []
        },
        bonusModules: {
            type: Array,
            default: []
        },
        userModules: {
            type: Array,
            default: []
        },
        completedModules: {
            type: Array,
            default: []
        },
        userResourceCompletions: {
            type: Array,
            default: []
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
            allModules: this.standardModules.concat(this.bonusModules),
            search: '',
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
            if (!this.currentBonusModules.length) {
                return this.tabs.filter(tab => tab.name !== "bonus");
            }

            return this.tabs;
        },
        currentBonusModules() {
            return this.filterBonusModules()
        }
    },

    watch: {
        search: function (value) {
            this.allModules = this.standardModules.concat(this.bonusModules);
            this.allModules = this.allModules.filter(module => {
                return module.name.en.toLowerCase().includes(value.toLowerCase())
            });
            console.log(this.allModules);
        }
    },
    methods: {
        filterStandardModules(skillLevel) {
            if (!this.userLoggedIn) {
                return this.standardModules.filter(
                    x => x.skill_level === skillLevel && this.allModules.includes(x)
                );
            }

            if (this.userLoggedIn && this.showAllModules) {
                let modules = this.standardModules.filter(
                    x => x.skill_level === skillLevel && this.allModules.includes(x)
                );

                let userModules = modules.filter(x =>
                    this.userModules.includes(x.id)
                );

                modules = modules.filter(x => !this.userModules.includes(x.id));

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
            if (!this.userLoggedIn) {
                return this.bonusModules.filter(
                    x => this.allModules != undefined && this.allModules.includes(x)
                );
            }

            if (this.userLoggedIn && this.showAllModules) {
                let bonusModules = this.bonusModules.filter(
                    x => this.allModules != undefined && this.allModules.includes(x)
                );

                let userModules = bonusModules.filter(({ id }) =>
                    this.userModules.includes(id)
                );

                let modules = bonusModules.filter(
                    ({ id }) => !this.userModules.includes(id)
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

            if (!this.filteredTabs.includes(activeTab)) {
                this.$refs.tabs.setActiveTab(
                    this.$refs[`tab-${this.tabs[0].name.toLowerCase()}`][0].href
                );
            }
        },

        getModuleCompletedResources({ resources_for_current_session }) {
            if (!this.userLoggedIn) {
                return 0;
            }

            let userResourceCompletions = this.userResourceCompletions.map(x =>
                parseInt(x)
            );

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
                tab.name === newTab.name.toLowerCase()
                    ? (tab.selected = true)
                    : (tab.selected = false);
            });
        },
        moduleHasNewResources({ resources_for_current_session }) {
            if (!this.userLoggedIn) {
                return false;
            }

            return resources_for_current_session.filter(resource => resource.is_new).length > 0
        }
    }
};
</script>
