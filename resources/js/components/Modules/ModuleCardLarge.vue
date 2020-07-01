<template>
    <div class="w-full p-3 sm:w-1/2 lg:w-1/3">
        <div class="relative flex flex-col w-full h-full bg-white shadow-md hover:no-underline">
            <span
                v-show="isCompleted"
                class="absolute top-0 right-0 z-10 inline-flex items-center px-3 py-1 mt-4 mr-4 text-sm font-semibold bg-white rounded-full shadow-md text-east-bay">
                Completed
                <svg class="w-4 h-4 ml-2 text-teal-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <path d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z" fill-rule="evenodd"/>
                </svg>
            </span>

            <div
                class="relative flex-initial block overflow-hidden pb-7/12 lg:pb-3/5"
                :class="cardColorClass"
            >
                <img
                    v-show="imageExists"
                    class="absolute bottom-0 w-full h-auto max-h-full transform -translate-x-1/2 left-1/2 will-change-transform"
                    :alt="item.name[trans.locale]"
                    :src="`/images/modules/${ imageName }.svg`"
                    @load="handleImageLoaded"
                />
            </div>

            <div class="relative flex-1 block px-6 pt-8 pb-24 text-base xl:pt-12 xl:text-xl">
                <span class="text-xl font-semibold md:tracking-tighter xl:text-3xl">
                    {{ item.name[trans.locale] }}
                </span>

                <template v-if="isUserModule">
                    <ul class="block mt-6">
                        <li class="inline-flex items-center justify-between w-full">
                            <span class="text-east-bay">Resources</span>
                            <span class="font-semibold text-gray-900">
                                {{ completedResourcesPercentage }}%
                            </span>
                        </li>

                        <!-- @todo display this once Quizzes and Exercises created -->
                        <!-- <li class="inline-flex items-center justify-between w-full mt-3">
                            <span class="text-east-bay">Quizzes</span>
                            <span class="font-semibold text-gray-900">20%</span>
                        </li>

                        <li class="inline-flex items-center justify-between w-full mt-3">
                            <span class="text-east-bay">Exercises</span>
                            <span class="font-semibold text-gray-900">20%</span>
                        </li> -->
                    </ul>
                </template>

                <p class="absolute bottom-0 left-0 w-full px-6 pb-6">
                    <a
                        class="w-full text-base text-center button button-teal xxl:text-xl"
                        :href="moduleUrl"
                    >
                        <span>{{ buttonText }}</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object
        },
        cardIsEven: {
            type: Boolean,
            default: false,
        },
        level: {
            type: String,
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
        }
    },

    data() {
        return {
            moduleCardColors: {
                beginner: {
                    even: 'bg-teal-700',
                    odd: 'bg-teal-400',
                },
                intermediate: {
                    even: 'bg-cornflower-blue',
                    odd: 'bg-blue-violet',
                },
                advanced: {
                    even: 'bg-pink-900',
                    odd: 'bg-pink-800',
                }
            },
            moduleUrl: `/${this.trans.locale}/modules/${this.item.slug}/free-resources`,
            resourcesForSessionCount: this.item.resources_for_current_session.length,
            buttonText: this.getButtonText(),
            imageExists: false,
        }
    },

    computed: {
        cardColorClass() {
            return this.cardIsEven
                ? this.moduleCardColors[this.level].even
                : this.moduleCardColors[this.level].odd;
        },

        completedResourcesPercentage() {
            return this.resourcesForSessionCount > 0
                ? Math.round((this.completedResourcesCount / this.resourcesForSessionCount) * 100)
                : 0;
        },

        imageName() {
            return this.$options.filters.slug(this.item.name[this.trans.locale]);
        },
    },

    methods: {
        getButtonText() {
            if (! this.isUserModule || this.isCompleted) {
                return 'View Module';
            }

            return 'Finish Module';
        },

        handleImageLoaded() {
            this.imageExists = true;
        },
    },
}
</script>
