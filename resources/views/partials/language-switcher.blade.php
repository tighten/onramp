<div>
    <div x-data="{isOpen: false, language: window.language, languages: window.locales}" class="relative inline-block text-left hidden lg:block">
        <div>
            <button type="button" class="inline-flex items-center justify-center w-full h-12 text-base font-semibold text-white transition-colors duration-300 ease-in-out focus:outline-none focus:border-white hover:text-mint" @click="isOpen = !isOpen">
                <span x-text="language"></span>

                <svg class="w-3 h-auto ml-2 duration-300 ease-in-out stroke-current transition-rotate text-mint" :class="{
                'transform -scale-y-100': isOpen
            }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 11">
                    <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round" />
                </svg>
            </button>
        </div>

        <!-- todo: handle transition (after switching to alpine) -->
        <!-- <transition name="grow"> -->
        <div x-show="isOpen" class="absolute right-0 z-50 w-32 mt-2 origin-top-right rounded-md shadow-lg">
            <div class="overflow-hidden bg-white rounded-md shadow-xs">
                <template x-for="(lang, slug) in languages" :key="slug">
                    <a href="#" @click="chooseLanguage(slug)" x-text="lang" class="block px-4 py-3 text-sm font-medium leading-5 transition-colors duration-75 ease-in-out cursor-pointer hover:no-underline hover:bg-silver focus:outline-none focus:bg-silver">
                    </a>
                </template>
            </div>
        </div>
        <!-- </transition> -->
    </div>

    <div x-data="{isOpen: false, language: window.language, languages: window.locales}" class="relative z-50 mb-6 lg:hidden">
        <button x-show="isOpen" x-on:click="isOpen = false" tabindex="-1" class="fixed inset-0 hidden w-full h-full cursor-default" aria-label="close language switcher"></button>

        <div class="px-6 py-3 lg:p-0">
            <label for="language-switcher" class="flex items-center -ml-2 text-white focus:outline-none ">
                <button x-text="language" x-on:click="isOpen = !isOpen" id="alpine-language-switcher" tabindex="1" class="mr-3 font-bold text-body focus:outline-none focus:border-white">
                </button>

                <svg class="w-3 h-auto transition duration-300 ease-in-out stroke-current text-mint" :class="{ 'transform -scale-y-100': isOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 11">
                    <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round" />
                </svg>
            </label>
        </div>

        <!-- todo: handle transition (after switching to alpine) -->
        <!-- <transition name="slide"> -->
        <div x-show="isOpen" x-on:click.away="isOpen = false" class="overflow-hidden bg-steel lg:absolute lg:mt-12 lg:shadow-xl lg:left-0 lg:top-0">
            <template x-for="(lang, slug) in languages" :key="slug">
                <button x-text="lang" x-on:click="chooseLanguage(slug)" class="block w-full px-6 py-2 text-base font-normal text-left text-white transition-colors duration-200 ease-in-out focus:outline-none hover:bg-purple">
                </button>
            </template>
        </div>
        <!-- </transition> -->
    </div>

</div>
