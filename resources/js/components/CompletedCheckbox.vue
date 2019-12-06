<template>
    <div class="inline-block">
        <div
            @click="toggle"
            class="border border-gray-600 inline-block cursor-pointer w-4 h-4"
            :class="{'bg-gray-500': isCompleted}"
            >
        </div>
    </div>
</template>

<script>
    export default {
        props: {
           initialIsCompleted: {
               type: Boolean,
               default: false
           },
           type: {},
           id: {},
        },

        data() {
            return {
                isCompleted: this.initialIsCompleted,
            }
        },

        methods: {
            toggle() {
                if (this.isCompleted) {
                    this.markNotCompleted();
                } else {
                    this.markCompleted();
                }

                this.isCompleted = ! this.isCompleted;
            },

            markCompleted() {
                axios.post(route('user.completions.store', {'locale': 'en'}), {
                    'completable_type': this.type,
                    'completable_id': this.id,
                })
                .catch(function (error) {
                    alert('Error!');
                });
            },

            markNotCompleted() {
                axios.delete(route('user.completions.destroy', {'locale': 'en'}), {
                    data:{
                        'completable_type': this.type,
                        'completable_id': this.id,
                    }
                })
                .catch(function (error) {
                    alert('Error!');
                });
            }
        },

    }
</script>
