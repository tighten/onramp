<template>
    <p class="mb-8 text-right text-sm">
        <a @click="showOnlyLanguage()" v-bind:class="{'font-bold' : activeLanguage}">{{ language }} resources</a> |
        <a @click="showAll()" v-bind:class="{'font-bold' : !activeLanguage}">All resources</a>
    </p>
</template>

<script>
    export default {
        props: {
            language: {
                type: String,
                required: true
            },
            locale: {
                type: String,
                required: true
            },
            user: {
                type: String,
                required: true
            },
        },
        data() {
            return {
                activeLanguage: true,
            }
        },

        methods: {
            showAll() {
                console.log('show all', window.location)
                this.activeLanguage = false
                sessionStorage.setItem('module-language-setting', 'english-and-current')
            },
            showOnlyLanguage() {
                console.log('show only language ' + this.language, window.location)
                this.activeLanguage = true
                const slug = window.location.pathname.substr(4)
                window.location.replace('/' + this.locale + '/' + slug)
                sessionStorage.setItem('module-language-setting', 'only-current')
            },
        },
    }
</script>
