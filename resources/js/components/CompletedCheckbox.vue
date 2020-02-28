<template>
    <div class="inline-block mr-1">
        <div
            @click="toggle"
            class="border border-gray-600 inline-flex justify-center items-center cursor-pointer w-4 h-4"
            :class="{'bg-gray-600': isCompleted}"
            >
            <svg
                class="w-3 h-3 fill-current text-white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24">
                <path
                    d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"
                ></path>
            </svg>
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
