<template>
    <div class="flex-initial w-full px-3 pb-5 sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
        <a
            class="flex flex-col w-full h-full transition-transform duration-300 transform shadow-md hover:no-underline hover:scale-95"
            :href="moduleUrl"
        >
            <span
                v-show="isCompleted && isUserModule"
                class="absolute top-0 right-0 z-10 inline-flex items-center px-3 py-1 mt-3 mr-3 text-sm font-semibold bg-white rounded-full shadow-md text-east-bay">
                Completed
                <svg class="w-4 h-4 ml-2 text-teal-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <path d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z" fill-rule="evenodd"/>
                </svg>
            </span>

            <span :class="`relative block pb-8/12 xl:pb-3/5 ${cardColorClass}`">
                <img
                    v-show="imageExists"
                    class="absolute bottom-0 w-full h-auto max-h-full transform -translate-x-1/2 left-1/2 will-change-transform"
                    :alt="item.name[trans.locale]"
                    :src="`/images/modules/${ imageName }.svg`"
                    @load="handleImageLoaded"
                />
               
            </span>
            
            <span class="flex-1 block p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                <h4 class="text-base font-semibold leading-5 tracking-normal text-east-bay sm:text-lg">
                    {{ item.name[trans.locale] ? item.name[trans.locale] : item.name['en'] }}
                </h4>

                <template v-if="(! isCompleted) && isUserModule">
                    <p class="pt-5 mt-5 text-sm font-semibold tracking-wider text-gray-700 uppercase border-t border-gray-300">My progress:</p>
                    
                    <ul class="block mt-2 text-base">
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
            </span>
        </a>
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
        },
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
                },
                bonus: {
                    even: 'bg-oxford-blue',
                    odd: 'bg-east-bay',
                }
            },
            moduleUrl: `/${this.trans.locale}/modules/${this.item.slug}/free-resources`,
            imageExists: false,
        }
    },

    computed: {
        cardColorClass() {
            return this.cardIsEven
                ? this.moduleCardColors[this.level].even
                : this.moduleCardColors[this.level].odd;
        },

        imageName() {
            return this.$options.filters.slug(this.item.name['en']);
        },

        freeResourcesForSessionCount() 
        {
            let freeResourcesForSession = this.item.resources_for_current_session.filter(resrc => resrc.is_free).length;
            return freeResourcesForSession ? freeResourcesForSession : 0;
        },

        completedResourcesPercentage() {
            return this.freeResourcesForSessionCount > 0
                ? Math.round((this.completedResourcesCount / this.freeResourcesForSessionCount) * 100)
                : 0;
        },
    },

    methods: {
        handleImageLoaded() {
            this.imageExists = true;
        },
    },
}
</script>
