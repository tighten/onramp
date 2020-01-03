<template>
    <p class="mb-8 text-right text-sm">
        <a
            @click="showOnlyLocalLanguage()"
            class="cursor-pointer"
            v-bind:class="{'font-bold' : choiceIsSelected('local')}"
            >{{ trans.get('__JSON__.:locale resources', {'locale': language}) }}</a> |
        <span v-if="language !== 'English'">
            <a
                @click="showEnglishAndLocalLanguage()"
                class="cursor-pointer"
                v-bind:class="{'font-bold' : choiceIsSelected('local-and-english')}"
                >{{ trans.get('__JSON__.English and :locale resources', {'locale': language}) }}</a> |
        </span>
        <a
            @click="showAll()"
            class="cursor-pointer"
            v-bind:class="{'font-bold' : choiceIsSelected('all')}"
            >{{ trans.get('__JSON__.All resources') }}</a>
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
                type: String,
                required: true
            },
        },

        data() {
            return {
                choice: this.initialChoice,
            }
        },

        methods: {
            choose(value) {
                this.choice = value;
                axios.patch(route('user.preferences.update', {'locale': 'en'}), {
                    'resource-language': value,
                })
                .then(function () {
                    window.location.reload(false);
                })
                .catch(function (error) {
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
