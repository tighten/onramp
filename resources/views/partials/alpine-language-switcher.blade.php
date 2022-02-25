<!-- Todo: Re-create this Vue version when we start using the Alpine version on Desktop -->
<!--menu-dropdown :toggle-text="language" class="hidden lg:block">
    <menu-dropdown-item v-for="(lang, slug) in languages" :key="slug" :text="lang" @clicked="choose(slug)"></menu-dropdown-item>
</menu-dropdown-->

<div x-data="mobileLanguageDropdown('{{ $language }}', {{ json_encode($locales) }})" class="relative z-50 mb-6 lg:hidden">
    <button x-show="isLanguageDropdownOpen" x-on:click="isLanguageDropdownOpen = false" tabindex="-1" class="fixed inset-0 hidden w-full h-full cursor-default" aria-label="close language switcher"></button>

    <div class="px-6 py-3 lg:p-0">
        <label for="language-switcher" class="flex items-center -ml-2 text-white focus:outline-none ">
            <button x-on:click="toggleLanguageDropdown" id="alpine-language-switcher" tabindex="1" class="mr-3 font-bold text-body focus:outline-none focus:border-white">
                {{ $language }}
            </button>

            <svg class="w-3 h-auto transition duration-300 ease-in-out stroke-current text-mint" :class="{ 'transform -scale-y-100': isLanguageDropdownOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 11">
                <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round" />
            </svg>
        </label>
    </div>

    <!-- todo: fix transition after switching to alpine -->
    <!-- <transition name="slide"> -->
    <div x-show="isLanguageDropdownOpen" x-on:click.away="close" class="overflow-hidden bg-steel lg:absolute lg:mt-12 lg:shadow-xl lg:left-0 lg:top-0">
        <template x-for="(lang, slug) in languages" :key="slug">
            <button x-text="lang" x-on:click="chooseLanguage(slug)" class="block w-full px-6 py-2 text-base font-normal text-left text-white transition-colors duration-200 ease-in-out focus:outline-none hover:bg-purple">

            </button>
        </template>
    </div>
    <!-- </transition> -->
</div>
