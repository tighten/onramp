import {ref, computed} from 'vue';

export default function useModules(props) {
    const tabRefs = ref({});
    const showAllModules = ref(!props.userLoggedIn);

    const tabs = ref([
        {name: 'Beginner', selected: true},
        {name: 'Intermediate', selected: false},
        {name: 'Advanced', selected: false},
        {name: 'Bonus', selected: false},
    ]);

    const selectedTab = ref(tabs.value[0].name);

    const capitalize = (word) => {
        return word.charAt(0).toUpperCase() + word.slice(1);
    };

    const toggleShowAllModules = () => {
        showAllModules.value = !showAllModules.value;
    };

    const userModuleIds = computed(() => new Set((props.userModules || []).map((id) => parseInt(id, 10))));
    const completedModuleIds = computed(() => new Set((props.completedModules || []).map((id) => parseInt(id, 10))));
    const completedResourceIds = computed(() => new Set((props.userResourceCompletions || []).map((id) => parseInt(id, 10))));

    const filterStandardModules = (skillLevel) => {
        const lowerSkill = skillLevel.toLowerCase();
        const modulesByLevel = props.standardModules.filter(
            (module) => module.skill_level.toLowerCase() === lowerSkill
        );

        if (!props.userLoggedIn) return modulesByLevel;

        const filterByUser = (mod) => userModuleIds.value.has(mod.id);
        return showAllModules.value
            ? [...modulesByLevel.filter(filterByUser), ...modulesByLevel.filter((mod) => !filterByUser(mod))]
            : modulesByLevel.filter(filterByUser);
    };

    const beginnerModules = computed(() => filterStandardModules('Beginner'));
    const intermediateModules = computed(() =>
        filterStandardModules('Intermediate')
    );
    const advancedModules = computed(() => filterStandardModules('Advanced'));

    const currentBonusModules = computed(() => {
        if (!props.userLoggedIn) return props.bonusModules;

        const filterByUser = ({id}) => userModuleIds.value.has(id);
        return showAllModules.value
            ? [...props.bonusModules.filter(filterByUser), ...props.bonusModules.filter((mod) => !filterByUser(mod))]
            : props.bonusModules.filter(filterByUser);
    });

    const getModuleCompletedResources = (mod) =>
        props.userLoggedIn
            ? mod.resources_for_current_session.filter(({id}) =>
                completedResourceIds.value.has(id)
            ).length
            : 0;

    const getModuleIsCompleted = (mod) => {
        return completedModuleIds.value.has(mod.id);
    };

    const moduleHasNewResources = (mod) =>
        props.userLoggedIn && mod.resources_for_current_session.some(resource => resource.is_new);

    const filteredTabs = computed(() =>
        tabs.value.filter((tab) => tab.name !== 'Bonus' || currentBonusModules.value.length)
    );

    return {
        tabRefs,
        showAllModules,
        tabs,
        selectedTab,
        currentBonusModules,
        beginnerModules,
        intermediateModules,
        advancedModules,
        filteredTabs,
        capitalize,
        toggleShowAllModules,
        getModuleCompletedResources,
        getModuleIsCompleted,
        moduleHasNewResources,
    };
}
