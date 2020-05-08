<template>
    <div>
        <div v-show="logout" class="border-t border-gray-200"></div>

        <a
            :href="href"
            class="block px-4 py-3 text-sm font-medium leading-5 cursor-pointer hover:no-underline hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:bg-gray-100 focus:text-gray-800"
            @click="handleClick"
        >
            {{ text }}
        </a>
    </div>
</template>

<script>
export default {
    props: {
        href: {
            type: String,
        },
        text: {
            type: String,
            required: true,
        },
        logout: {
            type: Boolean,
            default: false,
        }
    },

    methods: {
        handleClick(event) {
            this.$emit('clicked');

            if (this.logout) {
                this.$root.$emit('logout', event);
            }
        }
    }
}
</script>
