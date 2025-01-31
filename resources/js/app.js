import { createApp } from 'vue'; // Import Vue
import './bootstrap'; // Ensure any global libraries are initialized
import ClickOutside from './directives/ClickOutside';
import Lang from 'lang.js';
import Translations from './translations';
import Alpine from 'alpinejs';

// Setup Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Create the Vue app instance
const app = createApp({
    data() {
        return {
            modals: {
                mobileMenu: false,
            },
        };
    },
    methods: {
        openModal(modalName) {
            this.modals[modalName] = true;
            document.documentElement.style.overflow = 'hidden';
        },
        closeModal() {
            for (let modal in this.modals) {
                this.modals[modal] = false;
            }
            document.documentElement.style.overflow = 'auto';
        },
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        },
    },
});

// Add global properties
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

// Add custom directives
app.directive('click-outside', ClickOutside);

// Export the app instance
app.mount('#app-body');
export default app;
