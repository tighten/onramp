import {createApp, ref} from 'vue';
import './bootstrap';
import Lang from 'lang.js';
import Translations from './translations';
import ClickOutside from './directives/ClickOutside';
import Alpine from 'alpinejs';
import Notifications from '@kyvg/vue3-notification';
import VueSelect from "vue-select";

import CompletableButton from './components/Completables/CompletedButton.vue';
import CompletedBadge from './components/Completables/CompletedBadge.vue';
import CompletedCheckbox from './components/Completables/CompletedCheckbox.vue';
import Modal from './components/Modal.vue';
import ModalMobileMenu from './components/ModalMobileMenu.vue';
import ModuleListing from './components/Modules/ModuleListing.vue';
import ModuleCard from './components/Modules/ModuleCard.vue';
import ResourceLanguagePreferenceSwitcher from './components/ResourceLanguagePreferenceSwitcher.vue';
import SelectDropdown from './components/SelectDropdown.vue';
import SitewideBanner from './components/SitewideBanner.vue';
import Skill from './components/Skill.vue';
import Tab from './components/Tabs/Tab.vue';
import Tabs from './components/Tabs/Tabs.vue';
import TabsWithSelect from './components/Tabs/TabsWithSelect.vue';
import Toast from './components/Toast.vue';
import ToggleWhenMobile from './components/ToggleWhenMobile.vue';

window.Alpine = Alpine;
Alpine.start();

const app = createApp({
    setup() {
        // State
        const modals = ref({
            mobileMenu: false,
        });

        // Methods
        const openModal = (modalName) => {
            modals.value[modalName] = true;
            document.documentElement.style.overflow = 'hidden';
        };

        const closeModal = () => {
            Object.keys(modals.value).forEach((modal) => {
                modals.value[modal] = false;
            });
            document.documentElement.style.overflow = 'auto';
        };

        const logout = (e) => {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        };

        return {
            modals,
            openModal,
            closeModal,
            logout,
        };
    },
});

const components = {
    'completed-badge': CompletedBadge,
    'completable-button': CompletableButton,
    'completed-checkbox': CompletedCheckbox,
    'modal': Modal,
    'modal-mobile-menu': ModalMobileMenu,
    'module-card': ModuleCard,
    'module-listing': ModuleListing,
    'resource-language-preference-switcher': ResourceLanguagePreferenceSwitcher,
    'select-dropdown': SelectDropdown,
    'skill': Skill,
    'sitewide-banner': SitewideBanner,
    'tab': Tab,
    'tabs': Tabs,
    'tabs-with-select': TabsWithSelect,
    'toast': Toast,
    'toggle-when-mobile': ToggleWhenMobile,
    'vue-select': VueSelect,
};

Object.entries(components).forEach(([name, component]) => {
    app.component(name, component);
});

app.config.globalProperties.trans = new Lang({
    messages: Translations,
    locale: window.locale,
    fallback: window.fallback_locale,
});

app.config.globalProperties.$filters = {
    capitalize(string) {
        if (!string) return '';
        return string
            .toString()
            .toLowerCase()
            .split(' ')
            .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    },
    slug(string) {
        return string
            .toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    },
};

app.directive('click-outside', ClickOutside);

app.use(Notifications);

app.mount('#app-body');

export default app;
