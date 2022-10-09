<template>
    <ul v-if="!toggle">
        <li @click="toggle = !toggle" class="relative block px-4 py-2 m-1 font-bold leading-5 text-left md:m-2 text-teal sm:leading-6 lg:text-xl lg:leading-8">
            <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal"></span>
            <span>{{ this.buttonTextPlus }}</span>
        </li>
    </ul>
    <ul v-else class="flex flex-wrap">
        <skill v-for="skill in skills" v-bind:key="skill.id"
            :completable="skill.completable"
            :init-completed="skill.initCompleted"
            :id="skill.id"
            :text="skill.text"
            :type="skill.type"
        ></skill>
        <li @click="toggle = !toggle" class="relative block px-4 py-2 m-1 font-bold leading-5 text-left md:m-2 text-teal sm:leading-6 lg:text-xl lg:leading-8">
            <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal"></span>
            <span>{{ this.buttonTextMinus }}</span>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            skills: {
                type: Array,
                default: []
            },
            buttonTextPlus: {
                type: String,
                default: ''
            },
            buttonTextMinus: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                toggle: false,
            }
        }
    }
</script>
