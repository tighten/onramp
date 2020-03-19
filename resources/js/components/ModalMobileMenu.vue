<template>
    <modal :show="show">
        <template slot-scope="modal">
            <div class="border-blue-violet border-t-4 flex flex-col h-auto justify-between min-h-screen overflow-scroll pt-12">
                <nav class="mt-2">
                    <div class="border-b border-gray-300">
                        <slot name="navigation-links"></slot>
                    </div>

                    <div class="py-4">
                        <slot name="subnavigation-links"></slot>
                    </div>
                </nav>

                <div class="border-t border-gray-300 flex items-center justify-between mt-4 px-4 py-10">
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
