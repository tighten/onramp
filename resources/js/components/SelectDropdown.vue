<template>
    <div class="relative" :tabindex="tabindex" @blur="isOpen = false">
        <button
            type="button"
            class="text-black relative block h-12 w-full truncate rounded-md border bg-white px-5 py-4 pr-12 text-left text-base font-semibold leading-none focus:outline-none"
            :class="{ 'rounded-bl-none rounded-br-none': isOpen }"
            aria-haspopup="listbox"
            :aria-expanded="isOpen.toString()"
            @click="isOpen = !isOpen"
        >
            <span>{{ selected }}</span>

            <svg
                class="absolute right-0 top-0 mr-5 h-full w-4 stroke-current"
                :class="{ 'mt-0 -scale-y-100 transform': isOpen }"
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
            class="absolute left-0 top-0 mt-12 w-full overflow-hidden rounded-b-md shadow-md"
            :class="[isOpen ? 'h-auto border border-t-0' : 'h-0']"
            role="listbox"
        >
            <li v-for="option of options" :key="option" class="border-t first:border-t-0">
                <button
                    type="button"
                    class="relative block w-full truncate bg-white px-5 py-4 pr-12 text-left text-base font-semibold focus:outline-none"
                    :class="{ '': selected === option }"
                    role="option"
                    :aria-selected="(selected === option).toString()"
                    @click="setSelected(option)"
                >
                    <span>{{ option }}</span>

                    <template v-if="selected === option">
                        <svg
                            class="absolute right-0 top-1/2 mr-5 h-3 w-3 -translate-y-1/2 transform fill-current text-emerald"
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

<script setup>
import { ref, onMounted } from 'vue';

const { options, tabindex } = defineProps({
    options: {
        type: Array,
        default: () => [],
    },
    tabindex: {
        type: Number,
        default: 0,
    },
});

const emit = defineEmits(['selectChanged']);
const isOpen = ref(false);
const selected = ref(options.length > 0 ? options[0] : null);

function setSelected(option) {
    selected.value = option;
    isOpen.value = false;
    emit('selectChanged', option);
}

onMounted(() => {
    emit('selectChanged', selected.value);
});
</script>
