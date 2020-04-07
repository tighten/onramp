<template>
    <div
        class="relative"
        :tabindex="tabindex"
        @blur="open = false">
        <button
            class="relative block px-5 py-4 pr-12 h-12 w-full bg-gray-200 font-semibold
            text-left leading-none truncate rounded-md focus:outline-none"
            :class="{'rounded-bl-none rounded-br-none': isOpen}"
            @click="isOpen = !isOpen">
            <span>{{ selected }}</span>

            <svg class="absolute h-full w-4 mr-5 stroke-current right-0 top-0"
                :class="{'mt-0 transform -scale-y-100': isOpen}"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 11">
                <path d="M2 2l6 6 6-6" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round"/>
            </svg>
        </button>

        <ul
            class="absolute h-0 w-full overflow-hidden mt-12 left-0 top-0
            bg-gray-200"
            :class="{'h-auto border-t border-gray-400': isOpen}">
            <li
                class="border-t first:border-t-0"
                v-for="(option, i) of options"
                :key="i">
                <button
                    class="relative block px-5 py-4 pr-12 w-full font-semibold text-left truncate focus:outline-none hover:bg-gray-300"
                    :class="{'': selected === option}"
                    @click="setSelected(option)">
                    <span>{{ option }}</span>

                    <template v-if="selected === option">
                        <svg
                            class="absolute mr-5 w-3 h-3 fill-current text-teal-600 transform right-0 top-1/2 -translate-y-1/2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"
                            ></path>
                        </svg>
                    </template>
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        options: Array,
        tabindex: {
            type: Number,
            default: 0,
        }
    },

    data() {
        return {
            isOpen: false,
            selected: this.options.length > 0 ? this.options[0] : null,
        }
    },

    methods: {
        setSelected(option) {
            this.selected = option;
            this.isOpen = false;
            this.$emit('selectChanged', option);
        },
    },

    mounted(){
        this.$emit('selectChanged', this.selected);
    }
}
</script>
