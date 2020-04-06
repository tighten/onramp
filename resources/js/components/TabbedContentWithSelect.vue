<template>
    <div>
        <select-dropdown
            class="mb-8"
            :options="selectOptions"
        >
        </select-dropdown>


    </div>
</template>

<script>
import SelectDropdown from './SelectDropdown.vue';

export default {
    props: {
        selectOptions: Array,
    },

    components: {
        'select-dropdown': SelectDropdown,
    },

    mounted() {
        // console.log(this.selectOptions);
    }
}
</script>
