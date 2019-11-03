<template>
    <p class="mb-8 text-right text-sm">
        <a @click="showOnlyLocalLanguage()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('only-local-language')}">{{ language }} resources</a> |
        <a @click="showEnglishAndLocalLanguage()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('english-and-local-language')}">English and {{ language }} resources</a> |
        <a @click="showAll()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('all-languages')}">All resources</a>
    </p>
</template>

<script>
    export default {
        props: {
            language: {
                type: String,
                required: true
            },
            initialChoice: {
                type: String, // @todo can this be made enum?
                required: true
            },
        },

        data() {
            return {
                choice: null,
            }
        },

        mount() {
            // @todo make the UI words translateable
            this.choice = this.initialChoice;
        },

        methods: {
            choose(value) {
                this.choice = value;
                // @todo Axios post to modify my preference
            },
            showAll() {
                this.choose('all-languages');
            },
            showOnlyLocalLanguage() {
                this.choose('only-local-language');
            },
            showEnglishAndLocalLanguage() {
                this.choose('english-and-local-language');
            },
            choiceIsSelected(value) {
                return this.choice === value;
            },
        },
    }
</script>
