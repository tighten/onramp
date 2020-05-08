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

import './components';
import Lang from 'lang.js';
import Notifications from 'vue-notification';

Vue.prototype.trans = new Lang({
    messages: window.jsonTranslations,
    locale: window.locale,
    fallback: window.fallback_locale
});

Vue.use(Notifications);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        modals: {
            mobileMenu: false,
        },
    },

    methods: {
        openModal(modalName) {
            this.modals[modalName] = true;
            document.documentElement.style.overflow = 'hidden';
        },

        closeModal() {
            for (var modal in this.modals) {
                this.modals[modal] = false;
            }

            document.documentElement.style.overflow = 'auto';
        },

        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        }
    },

    created() {
        this.$on('closeModal', () => {
            this.closeModal();
        });

        this.$on('logout', (e) => {
            this.logout(e);
        });
    },
});
