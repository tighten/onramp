/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import './components';
import Lang from 'lang.js';
import Notifications from 'vue-notification';
import Translations from './translations';

Vue.prototype.trans = new Lang({
    messages: Translations,
    locale: window.locale,
    fallback: window.fallback_locale
});

Vue.use(Notifications);

Vue.filter('capitalize', function (string) {
    if (! string) {
        return '';
    }

    string = string.toString().toLowerCase();
    return string.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
});

Vue.filter('slug', function (string) {
    return string.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
});

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
