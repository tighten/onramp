<template>
    <div class="relative" :tabindex="tabindex" @blur="open = false">
        <button
            class="relative block w-full h-12 px-5 py-4 pr-12 text-base font-semibold leading-none text-left text-black truncate bg-white border rounded-md focus:outline-none"
            :class="{ 'rounded-bl-none rounded-br-none': isOpen }"
            @click="isOpen = !isOpen"
        >
            <span>{{ selected }}</span>

            <svg
                class="absolute top-0 right-0 w-4 h-full mr-5 stroke-current"
                :class="{ 'mt-0 transform -scale-y-100': isOpen }"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 11"
            >
                <path
                    d="M2 2l6 6 6-6"
                    stroke-width="3"
                    fill="none"
                    fill-rule="evenodd"
                    stroke-linecap="round"
                />
            </svg>
        </button>

        <ul
            class="absolute top-0 left-0 w-full mt-12 overflow-hidden shadow-md rounded-b-md"
            :class="[isOpen ? 'h-auto border border-t-0' : 'h-0']"
        >
            <li
                v-for="(option) of options"
                :key="option"
                class="border-t first:border-t-0"
            >
                <button
                    class="relative block w-full px-5 py-4 pr-12 text-base font-semibold text-left truncate bg-white focus:outline-none"
                    :class="{ '': selected === option }"
                    @click="setSelected(option)"
                >
                    <span>{{ option }}</span>

                    <template v-if="selected === option">
                        <svg
                            class="absolute right-0 w-3 h-3 mr-5 transform -translate-y-1/2 fill-current text-emerald top-1/2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
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
            default: 0
        }
    },

    data() {
        return {
            isOpen: false,
            selected: this.options.length > 0 ? this.options[0] : null
        };
    },

    methods: {
        setSelected(option) {
            this.selected = option;
            this.isOpen = false;
            this.$emit("selectChanged", option);
        }
    },

    mounted() {
        this.$emit("selectChanged", this.selected);
    }
};
</script>
