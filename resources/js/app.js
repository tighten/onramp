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
import CompletedCheckbox from './components/CompletedCheckbox.vue';
import Toast from './components/Toast.vue';
import ModalMobileMenu from './components/ModalMobileMenu.vue';
import SelectDropdown from './components/SelectDropdown.vue';
import TabsWithSelect from './components/TabsWithSelect.vue';
import Tabs from './components/Tabs.vue';
import Tab from './components/Tab.vue';
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

    components: {
        'language-switcher': LanguageSwitcher,
        'toggle-when-mobile': ToggleWhenMobile,
        'resource-language-preference-switcher': ResourceLanguagePreferenceSwitcher,
        'completed-checkbox': CompletedCheckbox,
        'toast': Toast,
        'modal-mobile-menu': ModalMobileMenu,
        'select-dropdown': SelectDropdown,
        'tabs-with-select': TabsWithSelect,
        'tabs': Tabs,
        'tab': Tab,
    },

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
        }
    },

    created() {
        this.$on('closeModal', () => {
            this.closeModal();
        });
    },
});
