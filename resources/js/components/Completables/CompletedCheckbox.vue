<template>
    <completable
        :type="type"
        :id="id"
        :initial-is-completed="initialIsCompleted"
    >
        <template slot-scope="{ toggle, isCompleted }">
            <div class="inline-block mr-1">
                <div
                    @click="toggle"
                    class="transition duration-200 ease-in-out cursor-pointer"
                    :class="{ 'text-teal hover:text-teal': isCompleted, 'text-gray hover:text-gray': !isCompleted }"
                >
                    <svg
                        class="w-6 h-6 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 30 30"
                    >
                        <path
                            d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z"
                            fill-rule="evenodd"
                        />
                    </svg>
                </div>
            </div>
        </template>
    </completable>
</template>

<script>
import Completable from "./Completable.vue";

export default {
    components: {
        Completable
    },

    props: {
        initialIsCompleted: {
            type: Boolean,
            default: false
        },
        type: {},
        id: {}
    }
};
</script>
