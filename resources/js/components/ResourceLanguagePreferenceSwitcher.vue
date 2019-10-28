<template>
    <p class="mb-8 text-right text-sm">
        <a @click="showOnlyLocalLanguage()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('local')}">{{ language }} resources</a> |
        <a @click="showEnglishAndLocalLanguage()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('local-and-english')}">English and {{ language }} resources</a> |
        <a @click="showAll()" class="cursor-pointer" v-bind:class="{'font-bold' : choiceIsSelected('all')}">All resources</a>
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
                choice: this.initialChoice,
            }
        },

        mount() {
            // @todo make the UI words translateable
        },

        methods: {
            choose(value) {
                this.choice = value;
                // @todo Axios post to modify my preference
                // @todo ziggy
                // @todo locale
                axios.post('/en/preferences', {
                    'resource-language-preference': value,
                })
                .catch(function (error) {
                    // @todo Handle better
                    alert('Error!');
                });
            },
            showAll() {
                this.choose('all');
            },
            showOnlyLocalLanguage() {
                this.choose('local');
            },
            showEnglishAndLocalLanguage() {
                this.choose('local-and-english');
            },
            choiceIsSelected(value) {
                return this.choice === value;
            },
        },
    }
</script>
