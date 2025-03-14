import { ref, computed } from 'vue';

export default function useModules(props) {
    const tabRefs = ref({});
    const showAllModules = ref(!props.userLoggedIn);

    const tabs = ref([
        { name: 'Beginner', selected: true },
        { name: 'Intermediate', selected: false },
        { name: 'Advanced', selected: false },
        { name: 'Bonus', selected: false },
    ]);

    const selectedTab = ref(tabs.value[0].name);

    const capitalize = (word) => {
        return word.charAt(0).toUpperCase() + word.slice(1);
    };

    const toggleShowAllModules = () => {
        showAllModules.value = !showAllModules.value;
    };

    const filterStandardModules = (skillLevel) => {
        const lowerSkill = skillLevel.toLowerCase();

        const modulesByLevel = props.standardModules.filter(
            (module) => module.skill_level.toLowerCase() === lowerSkill
        );

        if (!props.userLoggedIn) {
            return modulesByLevel;
        }

        if (showAllModules.value) {
            const user = modulesByLevel.filter((mod) =>
                props.userModules.includes(mod.id)
            );
            const nonUser = modulesByLevel.filter(
                (mod) => !props.userModules.includes(mod.id)
            );
            return [...user, ...nonUser];
        }

        return modulesByLevel.filter((mod) =>
            props.userModules.includes(mod.id)
        );
    };

    const beginnerModules = computed(() => filterStandardModules('Beginner'));
    const intermediateModules = computed(() =>
        filterStandardModules('Intermediate')
    );
    const advancedModules = computed(() => filterStandardModules('Advanced'));

    const currentBonusModules = computed(() => {
        if (!props.userLoggedIn) {
            return props.bonusModules;
        }

        if (showAllModules.value) {
            const user = props.bonusModules.filter(({ id }) =>
                props.userModules.includes(id)
            );
            const nonUser = props.bonusModules.filter(
                ({ id }) => !props.userModules.includes(id)
            );
            return [...user, ...nonUser];
        }

        return props.bonusModules.filter(({ id }) =>
            props.userModules.includes(id)
        );
    });

    const getModuleCompletedResources = (mod) => {
        if (!props.userLoggedIn) return 0;

        const completedResources = props.userResourceCompletions.map((id) =>
            parseInt(id, 10)
        );

        return mod.resources_for_current_session.filter(({ id }) =>
            completedResources.includes(id)
        ).length;
    };

    const getModuleIsCompleted = (mod) => {
        const completedModules = props.completedModules.map((id) =>
            parseInt(id, 10)
        );
        return completedModules.includes(mod.id);
    };

    const moduleHasNewResources = (mod) => {
        if (!props.userLoggedIn) return false;

        return mod.resources_for_current_session.some(
            (resource) => resource.is_new
        );
    };

    const filteredTabs = computed(() => {
        const activeTabs = tabs.value.filter((tab) => {
            if (tab.name === 'Bonus' && !currentBonusModules.value.length) {
                return false;
            }
            return true;
        });

        return activeTabs;
    });

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
