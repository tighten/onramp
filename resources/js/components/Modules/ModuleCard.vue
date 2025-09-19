<template>
    <div class="w-full flex-initial p-1.5 sm:w-1/2 sm:max-w-xs lg:w-1/3 xl:w-1/4">
        <a
            class="flex h-full w-full transform flex-col shadow-md transition-transform duration-300 hover:scale-95 hover:no-underline"
            :href="moduleUrl"
        >
            <span :class="`relative block h-44 w-full ${cardColorClass}`">
                <div v-if="hasNewContent" :class="`h-2 ${labelColorClass}`"></div>
                <div class="absolute right-0 top-0 z-10 flex flex-col items-end">
                    <span
                        v-if="hasNewContent"
                        :class="`inline-flex items-center px-3 py-1 text-sm font-semibold text-white ${labelColorClass} rounded-bl-md`"
                    >
                        New Resources
                    </span>
                </div>

                <img
                    v-show="imageExists"
                    class="absolute bottom-0 left-1/2 h-auto max-h-full w-full -translate-x-1/2 transform will-change-transform"
                    :alt="item.name[trans.locale]"
                    :src="`/images/modules/${imageName}.svg`"
                    @load="handleImageLoaded"
                />

                <span
                    v-show="isCompleted && isUserModule"
                    class="absolue text-east-bay absolute bottom-0 right-0 z-10 mb-3 mr-3 inline-flex items-center rounded-full bg-white px-3 py-1 text-sm font-semibold shadow-md"
                >
                    Completed
                    <svg
                        class="ml-2 h-4 w-4 fill-current text-teal"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 30 30"
                    >
                        <path
                            d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z"
                            fill-rule="evenodd"
                        />
                    </svg>
                </span>
            </span>

            <span class="block flex-1 bg-white p-4">
                <h4 class="text-base font-semibold leading-5 tracking-normal">
                    {{ item.name[trans.locale] ? item.name[trans.locale] : item.name['en'] }}
                </h4>

                <template v-if="!isCompleted && isUserModule">
                    <p
                        class="mt-5 border-t border-silver pt-5 text-sm font-semibold uppercase tracking-wider text-steel"
                    >
                        My progress:
                    </p>

                    <ul class="mt-2 block text-base">
                        <li class="inline-flex w-full items-center justify-between">
                            <span class="text-east-bay">Resources</span>
                            <span class="font-semibold text-steel">
                                {{ completedResourcesPercentage }}%
                            </span>
                        </li>

                        <!-- @todo display this once Quizzes and Exercises created -->
                        <!-- <li class="inline-flex items-center justify-between w-full mt-3">
                                <span class="text-east-bay">Quizzes</span>
                                <span class="font-semibold text-steel">20%</span>
                            </li>

                            <li class="inline-flex items-center justify-between w-full mt-3">
                                <span class="text-east-bay">Exercises</span>
                                <span class="font-semibold text-steel">20%</span>
                            </li> -->
                    </ul>
                </template>
            </span>
        </a>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const {
    item,
    cardIsEven,
    level,
    completedResourcesCount,
    isUserModule,
    isCompleted,
    hasNewContent,
} = defineProps({
    item: {
        type: Object,
        required: true,
    },
    cardIsEven: {
        type: Boolean,
        default: false,
    },
    level: {
        type: String,
        required: true,
    },
    completedResourcesCount: {
        type: Number,
        default: 0,
    },
    isUserModule: {
        type: Boolean,
        default: false,
    },
    isCompleted: {
        type: Boolean,
        default: false,
    },
    hasNewContent: {
        type: Boolean,
        default: false,
    },
});

const imageExists = ref(false);

const moduleCardColors = {
    beginner: {
        even: 'bg-teal',
        odd: 'bg-emerald',
    },
    intermediate: {
        even: 'bg-sea',
        odd: 'bg-lake',
    },
    advanced: {
        even: 'bg-cabernet',
        odd: 'bg-merlot',
    },
    bonus: {
        even: 'bg-steel',
        odd: 'bg-gray',
    },
};

const moduleUrl = computed(() => `/${window.locale}/modules/${item?.slug}/free-resources`);

const cardColorClass = computed(() =>
    cardIsEven ? moduleCardColors[level].even : moduleCardColors[level].odd
);

const labelColorClass = computed(() =>
    cardIsEven ? moduleCardColors[level].odd : moduleCardColors[level].even
);

const imageName = computed(() => slugify(item.name['en']));

const freeResourcesForSessionCount = computed(() => {
    const freeResources = item.resources_for_current_session.filter(
        (resrc) => resrc.is_free
    ).length;
    return freeResources || 0;
});

const completedResourcesPercentage = computed(() => {
    return freeResourcesForSessionCount.value > 0
        ? Math.round((completedResourcesCount / freeResourcesForSessionCount.value) * 100)
        : 0;
});

function handleImageLoaded() {
    imageExists.value = true;
}

function slugify(text) {
    return text
        .toString()
        .toLowerCase()
        .trim()
        .replace(/\s+/g, '-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-');
}
</script>
