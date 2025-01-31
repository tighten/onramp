<template>
    <div>
        <div
            class="grid w-full grid-cols-12 px-4 space-y-4 md:space-y-0 lg:mt-18 md:px-8 lg:px-20 2xl:px-32"
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
                        {{ name['en'] }}
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

<script setup>
import { ref, computed } from 'vue';
import Fuse from 'fuse.js';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

const props = defineProps({
    standardModules: { type: Array, default: () => [] },
    bonusModules: { type: Array, default: () => [] },
    userModules: { type: Array, default: () => [] },
    completedModules: { type: Array, default: () => [] },
    userResourceCompletions: { type: Array, default: () => [] },
    userLoggedIn: { type: Boolean, default: false },
});

const tabs = ref([
    { name: 'beginner', selected: true },
    { name: 'intermediate', selected: false },
    { name: 'advanced', selected: false },
    { name: 'bonus', selected: false },
]);

const tabsRef = ref(null);
const showAllModules = ref(!props.userLoggedIn);
const allModules = computed(() =>
    props.standardModules.concat(props.bonusModules)
);
const Deselect = { render: (createElement) => createElement('span', '') };

const filterStandardModules = (skillLevel) => {
    if (!props.userLoggedIn) {
        return props.standardModules.filter(
            (x) => x.skill_level === skillLevel
        );
    }

    if (props.userLoggedIn && showAllModules.value) {
        let modules = props.standardModules.filter(
            (x) => x.skill_level === skillLevel
        );
        let userModules = modules.filter((x) =>
            props.userModules.includes(x.id)
        );
        modules = modules.filter((x) => !props.userModules.includes(x.id));
        modules.unshift(...userModules);
        return modules;
    }

    return props.standardModules.filter(
        (x) => x.skill_level === skillLevel && props.userModules.includes(x.id)
    );
};

const filterBonusModules = () => {
    if (!props.userLoggedIn) return props.bonusModules;

    if (props.userLoggedIn && showAllModules.value) {
        let userModules = props.bonusModules.filter(({ id }) =>
            props.userModules.includes(id)
        );
        let modules = props.bonusModules.filter(
            ({ id }) => !props.userModules.includes(id)
        );
        modules.unshift(...userModules);
        return modules;
    }

    return props.bonusModules.filter(({ id }) =>
        props.userModules.includes(id)
    );
};

const currentBonusModules = ref(filterBonusModules());

const beginnerModules = computed(() => filterStandardModules('beginner'));
const intermediateModules = computed(() =>
    filterStandardModules('intermediate')
);
const advancedModules = computed(() => filterStandardModules('advanced'));
const filteredTabs = computed(() =>
    !currentBonusModules.value.length
        ? tabs.value.filter((tab) => tab.name !== 'bonus')
        : tabs.value
);

const myModules = computed(() => [
    ...filterStandardModules('beginner'),
    ...filterStandardModules('intermediate'),
    ...filterStandardModules('advanced'),
]);

const fuseSearch = (options, search) => {
    const locale = 'name.' + Vue.prototype.trans.getLocale();
    const fuse = new Fuse(options, {
        keys: ['`${locale}', 'slug', 'id'],
        shouldSort: true,
    });
    return search.length
        ? fuse.search(search).map(({ item }) => item)
        : fuse.list;
};

const changeRoute = (e) => {
    window.location.href = `/${Vue.prototype.trans.getLocale()}/modules/${
        e.slug
    }/free-resources`;
};

const toggleShowAllModules = () => {
    showAllModules.value = !showAllModules.value;
    currentBonusModules.value = filterBonusModules();
    filterStandardModules('beginner');
    filterStandardModules('intermediate');
    filterStandardModules('advanced');

    const activeTab = tabs.value.find((tab) => tab.selected);

    if (!filteredTabs.value.includes(activeTab)) {
        tabsRef.value.setActiveTab(
            tabsRef.value.$refs[`tab-${tabs.value[0].name.toLowerCase()}`][0]
                .href
        );
    }
};

const getModuleCompletedResources = ({ resources_for_current_session }) => {
    if (!props.userLoggedIn) return 0;

    const userResourceCompletions = props.userResourceCompletions.map((x) =>
        parseInt(x)
    );
    return resources_for_current_session.filter(({ id }) =>
        userResourceCompletions.includes(id)
    ).length;
};

const getModuleIsCompleted = ({ id }) => {
    const completedModules = props.completedModules.map((x) => parseInt(x));
    return completedModules.includes(id);
};

const updateSelectedTab = (newTab) => {
    tabs.value = tabs.value.map((tab) => ({
        ...tab,
        selected: tab.name === newTab.name.toLowerCase(),
    }));
};

const moduleHasNewResources = ({ resources_for_current_session }) => {
    if (!props.userLoggedIn) return false;
    return (
        resources_for_current_session.filter((resource) => resource.is_new)
            .length > 0
    );
};

defineExpose({
    showAllModules,
    beginnerModules,
    intermediateModules,
    advancedModules,
    filteredTabs,
    myModules,
    allModules,
    currentBonusModules,
    Deselect,
    fuseSearch,
    changeRoute,
    toggleShowAllModules,
    getModuleCompletedResources,
    getModuleIsCompleted,
    updateSelectedTab,
    moduleHasNewResources,
});
</script>

<!-- <style scoped>
:deep {
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
</style> -->
