<template>
    <p>
        <button
            @click="showAll"
            class="mr-2 text-base font-semibold text-white transition duration-200 ease-in-out cursor-pointer last:mr-0 lg:mr-4 lg:text-xl hover:opacity-100"
            :class="[choiceIsSelected('all') ? 'opacity-100' : 'opacity-70']"
        >{{ trans.get('__JSON__.All resources') }}
        </button>

        <button
            @click="showOnlyLocalLanguage"
            class="mr-2 text-base font-semibold text-white transition duration-200 ease-in-out cursor-pointer last:mr-0 lg:mr-4 lg:text-xl hover:opacity-100"
            :class="[choiceIsSelected('local') ? 'opacity-100' : 'opacity-70']"
        >{{ trans.get('__JSON__.:locale resources', {'locale': language}) }}
        </button>

        <span v-if="language !== 'English'">
            <button
                @click="showEnglishAndLocalLanguage"
                class="mr-2 text-base font-semibold text-white transition duration-200 ease-in-out cursor-pointer last:mr-0 lg:mr-4 lg:text-xl hover:opacity-100"
                :class="[choiceIsSelected('local-and-english') ? 'opacity-100' : 'opacity-70']"
            >{{ trans.get('__JSON__.English and :locale resources', {'locale': language}) }}</button>
        </span>
    </p>
</template>

<script setup>
import {ref} from 'vue';

const {initialChoice} = defineProps({
    language: {
        type: String,
        required: true
    },
    initialChoice: {
        type: String,
        required: true
    },
});

const choice = ref(initialChoice);

function choose(value) {
    choice.value = value;
    window.axios.patch(route('user.preferences.update', {'locale': 'en'}), {
        'resource-language': value,
    })
        .then(function () {
            window.location.reload(false);
        })
        .catch(function (error) {
            alert('Error!');
        });
}

function showAll() {
    choose('all');
}

function showOnlyLocalLanguage() {
    choose('local');
}

function showEnglishAndLocalLanguage() {
    choose('local-and-english');
}

function choiceIsSelected(value) {
    return choice.value === value;
}
</script>
