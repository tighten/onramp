<template>
    <div>
        <slot :is-completed="isCompleted" :toggle="toggle"></slot>
    </div>
</template>

<script setup>
import {ref} from 'vue';

const props = defineProps({
    initialIsCompleted: {
        type: Boolean,
        default: false
    },
    type: {
        type: String,
        required: true
    },
    id: {
        type: [String, Number],
        required: true
    },
});

const {type, id, initialIsCompleted} = props;
const isCompleted = ref(initialIsCompleted);

const markCompleted = () => {
    window.axios.post(route('user.completions.store', {'locale': 'en'}), {
        'completable_type': type,
        'completable_id': id,
    })
        .then(() => {
            console.log('Successfully marked as completed');
        })
        .catch((error) => {
            console.error('Error marking as completed:', error);
            alert('Error marking as completed. Please try again.');
        });
}

const markNotCompleted = () => {
    window.axios.delete(route('user.completions.destroy', {'locale': 'en'}), {
        data: {
            'completable_type': type,
            'completable_id': id,
        }
    })
        .then(() => {
            console.log('Successfully marked as not completed');
        })
        .catch((error) => {
            console.error('Error marking as not completed:', error);
            alert('Error marking as not completed. Please try again.');
        });
}

const toggle = () => {
    if (isCompleted.value) {
        markNotCompleted();
    } else {
        markCompleted();
    }

    isCompleted.value = !isCompleted.value;
}
</script>
