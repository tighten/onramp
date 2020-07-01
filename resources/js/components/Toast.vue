<template>
    <notifications position="top left">
       <template slot="body" slot-scope="props">
           <div class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:justify-end">
                <div class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto">
                    <div class="overflow-hidden rounded-lg shadow-xs">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-violet" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>

                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="mb-1 text-sm font-semibold leading-5 text-gray-900">
                                        {{ props.item.title }}
                                    </p>

                                    <p class="text-sm font-medium leading-4 text-gray-700">
                                        {{ props.item.text }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </template>
    </notifications>
</template>

<script>
export default {
    props: {
        'message': {
            type: String,
        },
        'title': {
            type: String,
        }
    },

    mounted() {
        this.$notify({
            'title': this.title ? this.title : 'Successfully updated!',
            'text': this.message,
        });
    }
}
</script>
