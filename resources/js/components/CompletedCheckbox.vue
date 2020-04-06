<template>
    <div class="inline-block mr-1">
        <div
            @click="toggle"
            class="cursor-pointer text-gray-500 duration-150 transition ease-in-out hover:text-gray-600"
            :class="{'text-teal-600 hover:text-teal-700': isCompleted}"
            >
            <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                <path d="M15 0c8.284 0 15 6.716 15 15 0 8.284-6.716 15-15 15-8.284 0-15-6.716-15-15C0 6.716 6.716 0 15 0zm6.44 9.44l-8.69 8.689-3.44-3.44-2.12 2.122 5.56 5.56 10.81-10.81-2.12-2.122z" fill-rule="evenodd"/>
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
