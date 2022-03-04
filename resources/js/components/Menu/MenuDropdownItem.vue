<template>
    <div>
        <div v-show="logout" class="border-t border-silver"></div>

        <a
            :href="href"
            class="block px-4 py-3 text-sm font-medium leading-5 transition-colors duration-75 ease-in-out cursor-pointer hover:no-underline hover:bg-silver focus:outline-none focus:bg-silver"
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
            type: String
        },
        text: {
            type: String,
            required: true
        },
        logout: {
            type: Boolean,
            default: false
        }
    },

    methods: {
        handleClick(event) {
            this.$emit("clicked");

            if (this.logout) {
                this.$root.$emit("logout", event);
            }
        }
    }
};
</script>
