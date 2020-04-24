<template>
    <modal :show="show">
        <template>
            <div class="flex flex-col justify-between h-auto min-h-screen pt-12 overflow-scroll border-t-4 border-blue-violet">
                <nav class="mt-2">
                    <div class="border-b border-gray-300">
                        <slot name="navigation-links"></slot>
                    </div>

                    <div class="py-4">
                        <slot name="subnavigation-links"></slot>
                    </div>
                </nav>

                <div class="flex items-center justify-between px-4 py-10 mt-4 border-t border-gray-300">
                    <slot name="navigation-buttons"></slot>
                </div>
            </div>
        </template>
    </modal>
</template>

<script>
import Modal from "./Modal";

export default {
    components: { Modal },

    props: {
        show: {}
    },
};
</script>
