<template>
    <div>
        <div
            class="w-full grid grid-cols-12 px-4 space-y-4 md:space-y-0 lg:mt-18 md:px-8 lg:px-20 2xl:px-32"
        >
            <div
                v-if="userLoggedIn"
                class="col-span-12 md:col-span-5 lg:col-span-4"
            >
                <span class="rounded-md shadow-sm">
                    <button
                        type="button"
                        class="w-1/2 p-2 text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-l-md focus:z-10 focus:outline-none focus:shadow-outline-teal"
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                showAllModules === true,
                        }"
                        @click="toggleShowAllModules"
                    >
                        All Modules
                    </button>

                    <button
                        type="button"
                        class="w-1/2 p-2 -ml-px text-sm leading-5 transition duration-100 ease-in-out bg-white border-2 border-silver rounded-r-md focus:z-10 focus:outline-none focus:shadow-outline-blue"
                        :class="{
                            'pointer-events-none border-emerald text-emerald shadow-md font-semibold':
                                showAllModules === false,
                        }"
                        @click="toggleShowAllModules"
                    >
                        My Modules
                    </button>
                </span>
            </div>

            <div
                :class="
                    userLoggedIn
                        ? 'col-span-12 md:col-span-7 lg:col-span-8 md:pl-6'
                        : 'col-span-12'
                "
            >
                <v-select
                    :filter="fuseSearch"
                    :options="showAllModules ? allModules : myModules"
                    @input="changeRoute($event)"
                    :get-option-label="(option) => option.slug"
                    :components="{ Deselect }"
                    :placeholder="`Search ${
                        showAllModules ? 'All' : 'My'
                    } Modules`"
                >
                    <template #option="{ id, slug, name }">
                        {{ name["en"] }}
                    </template>
                </v-select>
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
                    class="px-2 md:px-8 lg:px-20 2xl:px-32"
                    :class="{ 'lg:mt-32': index > 0 }"
                >
                    <h2
                        class="hidden w-full mb-10 text-4xl font-semibold leading-tight tracking-tight text-steel lg:block"
                    >
                        {{ tab.name | capitalize }}
                    </h2>

                    <div class="flex flex-wrap w-full">
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
import Fuse from "fuse.js";
import Vue from "vue";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

Vue.component("v-select", vSelect);
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
            default: false,
        },
    },

    data() {
        return {
            tabs: [
                {
                    name: "beginner",
                    selected: true,
                },
                {
                    name: "intermediate",
                    selected: false,
                },
                {
                    name: "advanced",
                    selected: false,
                },
                {
                    name: "bonus",
                    selected: false,
                },
            ],
            showAllModules: !this.userLoggedIn,
            currentBonusModules: this.filterBonusModules(),
            allModules: this.standardModules.concat(this.bonusModules),
            Deselect: {
                render: (createElement) => createElement("span", ""),
            },
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
                return this.tabs.filter((tab) => tab.name !== "bonus");
            }

            return this.tabs;
        },
        myModules() {
            return [
                ...this.filterStandardModules("beginner"),
                ...this.filterStandardModules("intermediate"),
                ...this.filterStandardModules("advanced"),
            ];
        },
    },
    methods: {
        fuseSearch(options, search) {
            let locale = "name." + Vue.prototype.trans.getLocale();

            const fuse = new Fuse(options, {
                keys: ["`${locale}", "slug", "id"],
                shouldSort: true,
            });
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list;
        },
        changeRoute(e) {
            window.location.href = `/${Vue.prototype.trans.getLocale()}/modules/${
                e.slug
            }/free-resources`;
        },
        filterStandardModules(skillLevel) {
            if (!this.userLoggedIn) {
                return this.standardModules.filter(
                    (x) => x.skill_level === skillLevel
                );
            }

            if (this.userLoggedIn && this.showAllModules) {
                let modules = this.standardModules.filter(
                    (x) => x.skill_level === skillLevel
                );

                let userModules = modules.filter((x) =>
                    this.userModules.includes(x.id)
                );

                modules = modules.filter(
                    (x) => !this.userModules.includes(x.id)
                );

                modules.unshift(...userModules);

                return modules;
            }

            return this.standardModules.filter((x) => {
                return (
                    x.skill_level === skillLevel &&
                    this.userModules.includes(x.id)
                );
            });
        },

        filterBonusModules() {
            if (!this.userLoggedIn) {
                return this.bonusModules;
            }

            if (this.userLoggedIn && this.showAllModules) {
                let userModules = this.bonusModules.filter(({ id }) =>
                    this.userModules.includes(id)
                );

                let modules = this.bonusModules.filter(
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

            let activeTab = this.tabs.filter((tab) => tab.selected)[0];

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

            let userResourceCompletions = this.userResourceCompletions.map(
                (x) => parseInt(x)
            );

            return resources_for_current_session.filter(({ id }) => {
                return userResourceCompletions.includes(id);
            }).length;
        },

        getModuleIsCompleted({ id }) {
            let completedModules = this.completedModules.map((x) =>
                parseInt(x)
            );
            return completedModules.includes(id);
        },

        updateSelectedTab(newTab) {
            this.tabs.map((tab) => {
                tab.name === newTab.name.toLowerCase()
                    ? (tab.selected = true)
                    : (tab.selected = false);
            });
        },
        moduleHasNewResources({ resources_for_current_session }) {
            if (!this.userLoggedIn) {
                return false;
            }

            return (
                resources_for_current_session.filter(
                    (resource) => resource.is_new
                ).length > 0
            );
        },
    },
};
</script>

<style scoped>
>>> {
    --vs-actions-padding: 13px 10px 10px;
    --vs-border-color: #a0aec0;
    --vs-border-width: 2px;
    --vs-border-style: solid;
    --vs-border-radius: 6px;
    --vs-font-size: 0.875rem;
    --vs-controls-color: #a0aec0;
    --vs-dropdown-option--active-bg: #a0aec0;

    /* Search Input */
    --vs-search-input-color: #096866;
    --vs-search-input-placeholder-color: #718096;

    /* Search Options */
    --vs-dropdown-option-padding: 3px 10px;
}
</style>
-->
