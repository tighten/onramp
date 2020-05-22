/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import LanguageSwitcher from './components/LanguageSwitcher.vue';
import ToggleWhenMobile from './components/ToggleWhenMobile.vue';
import ResourceLanguagePreferenceSwitcher from './components/ResourceLanguagePreferenceSwitcher.vue';
import CompletedCheckbox from './components/CompletedCheckbox.vue';
import Toast from './components/Toast.vue';
import Lang from 'lang.js';
import Notifications from 'vue-notification';
import Translations from './translations';

Vue.prototype.trans = new Lang({
    messages: Translations,
    locale: window.locale,
    fallback: window.fallback_locale
});

Vue.use(Notifications);

const app = new Vue({
    components: {
        'language-switcher': LanguageSwitcher,
        'toggle-when-mobile': ToggleWhenMobile,
        'resource-language-preference-switcher': ResourceLanguagePreferenceSwitcher,
        'completed-checkbox': CompletedCheckbox,
        'toast': Toast,
    },
    el: '#app',
});
