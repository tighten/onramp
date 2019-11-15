/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/LanguageSwitcher.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('language-switcher', require('./components/LanguageSwitcher.vue').default);

import LanguageSwitcher from './components/LanguageSwitcher.vue';
import ToggleWhenMobile from './components/ToggleWhenMobile.vue';
import ResourceLanguagePreferenceSwitcher from './components/ResourceLanguagePreferenceSwitcher.vue';
import Lang from 'lang.js';

Vue.prototype.trans = new Lang({
    messages: window.jsonTranslations,
    locale: window.locale,
    fallback: window.fallback_locale
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    components: {
        'language-switcher': LanguageSwitcher,
        'toggle-when-mobile': ToggleWhenMobile,
        'resource-language-preference-switcher': ResourceLanguagePreferenceSwitcher
    },
    el: '#app',
});
