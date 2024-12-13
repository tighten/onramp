import app from "./app"; // Import the Vue app instance
import CompletableButton from "./Completables/CompletedButton.vue";
import CompletedBadge from "./Completables/CompletedBadge.vue";
import CompletedCheckbox from "./Completables/CompletedCheckbox.vue";
import Modal from "./Modal.vue";
import ModalMobileMenu from "./ModalMobileMenu.vue";
import ModuleListing from "./Modules/ModuleListing.vue";
import ModuleCard from "./Modules/ModuleCard.vue";
import ResourceLanguagePreferenceSwitcher from "./ResourceLanguagePreferenceSwitcher.vue";
import SelectDropdown from "./SelectDropdown.vue";
import SitewideBanner from "./SitewideBanner.vue";
import Skill from "./Skill.vue";
import Tab from "./Tabs/Tab.vue";
import Tabs from "./Tabs/Tabs.vue";
import TabsWithSelect from "./Tabs/TabsWithSelect.vue";
// import Toast from "./Toast.vue";
import ToggleWhenMobile from "./ToggleWhenMobile.vue";

// Register components
app.component("toggle-when-mobile", ToggleWhenMobile);
app.component(
    "resource-language-preference-switcher",
    ResourceLanguagePreferenceSwitcher
);
app.component("completed-badge", CompletedBadge);
app.component("completed-button", CompletableButton);
app.component("completed-checkbox", CompletedCheckbox);
// app.component('toast', Toast);
app.component("modal", Modal);
app.component("modal-mobile-menu", ModalMobileMenu);
app.component("module-listing", ModuleListing);
app.component("module-card", ModuleCard);
app.component("select-dropdown", SelectDropdown);
app.component("sitewide-banner", SitewideBanner);
app.component("skill", Skill);
app.component("tab", Tab);
app.component("tabs", Tabs);
app.component("tabs-with-select", TabsWithSelect);

// Mount the app
app.mount("#app-body");
