<template>
    <div
        class="flex-initial w-full p-1.5 sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4"
    >
        <a
            class="flex flex-col w-full h-full transition-transform duration-300 transform shadow-md hover:no-underline hover:scale-95"
            :href="moduleUrl"
        >
            <span :class="`relative block w-full h-44 ${cardColorClass}`">
                <div
                    v-if="props.hasNewContent"
                    :class="`h-2 ${labelColorClass}`"
                ></div>
                <div
                    class="absolute top-0 right-0 z-10 flex flex-col items-end"
                >
                    <span
                        v-if="props.hasNewContent"
                        :class="`inline-flex items-center px-3 py-1 text-sm font-semibold text-white ${labelColorClass} rounded-bl-md`"
                    >
                        New Resources
                    </span>
                </div>

                <img
                    v-show="imageExists"
                    class="absolute bottom-0 w-full h-auto max-h-full transform -translate-x-1/2 left-1/2 will-change-transform"
                    :alt="props.item.name[trans.locale]"
                    :src="`/images/modules/${imageName}.svg`"
                    @load="handleImageLoaded"
                />

                <span
                    v-show="props.isCompleted && props.isUserModule"
                    class="absolute bottom-0 right-0 z-10 inline-flex items-center px-3 py-1 mb-3 mr-3 text-sm font-semibold bg-white rounded-full shadow-md absolue text-east-bay"
                >
                    Completed
                    <svg
                        class="w-4 h-4 ml-2 fill-current text-teal"
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

            <span class="flex-1 block p-4 bg-white">
                <h4 class="text-base font-semibold leading-5 tracking-normal">
                    {{
                        props.item.name[trans.locale]
                            ? props.item.name[trans.locale]
                            : props.item.name['en']
                    }}
                </h4>

                <template v-if="!props.isCompleted && props.isUserModule">
                    <p
                        class="pt-5 mt-5 text-sm font-semibold tracking-wider uppercase border-t text-steel border-silver"
                    >
                        My progress:
                    </p>

                    <ul class="block mt-2 text-base">
                        <li
                            class="inline-flex items-center justify-between w-full"
                        >
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

const props = defineProps({
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

const moduleUrl = computed(() => `/${props.item?.slug}/free-resources`);

const cardColorClass = computed(() =>
    props.cardIsEven
        ? moduleCardColors[props.level].even
        : moduleCardColors[props.level].odd
);

const labelColorClass = computed(() =>
    props.cardIsEven
        ? moduleCardColors[props.level].odd
        : moduleCardColors[props.level].even
);

const imageName = computed(() => slugify(props.item.name['en']));

const freeResourcesForSessionCount = computed(() => {
    const freeResources = props.item.resources_for_current_session.filter(
        (resrc) => resrc.is_free
    ).length;
    return freeResources || 0;
});

const completedResourcesPercentage = computed(() => {
    return freeResourcesForSessionCount.value > 0
        ? Math.round(
              (props.completedResourcesCount /
                  freeResourcesForSessionCount.value) *
                  100
          )
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
