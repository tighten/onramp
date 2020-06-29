<template>
    <div class="flex-initial w-full px-3 pb-5 sm:max-w-xs sm:w-1/2 lg:w-1/3 xl:w-1/4">
        <a
            class="flex flex-col w-full h-full transition-transform duration-300 transform shadow-md hover:no-underline hover:scale-95"
            :href="moduleUrl"
        >
            <span :class="`relative block pb-8/12 xl:pb-3/5 ${cardColorClass}`">
                <!--
                    @todo add this in once graphics are provided for each module
                    <img class="absolute bottom-0 w-3/4 transform -translate-x-1/2 left-1/2 will-change-transform"
                    src="/images/temp/img_basicwebsite.svg" alt="Image for the {{ mod.name[trans.locale] }} module.">
                -->
            </span>
            <span class="flex-1 block p-5 pb-8 bg-white xl:px-8 xl:pb-10">
                <h4 class="font-semibold tracking-tighter text-east-bay lg:text-lg">
                    {{ item.name[trans.locale] }}
                </h4>
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
            moduleUrl: `/${this.trans.locale}/modules/${this.item.slug}/free-resources`
        }
    },

    computed: {
        cardColorClass() {
            return this.cardIsEven
                ? this.moduleCardColors[this.level].even
                : this.moduleCardColors[this.level].odd;
        },
    },
}
</script>
