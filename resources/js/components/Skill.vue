<template>
    <li v-if="completable" :key="id" class="block m-1 md:m-2">
        <completed-badge 
            :badge-text="text"
            :id="id"
            :initial-is-completed="initCompleted"
            :type="type"
        ></completed-badge>
    </li>
    <li v-else :key="id" class="relative block px-4 py-2 m-1 font-bold leading-5 text-left md:m-2 text-teal sm:leading-6 lg:text-xl lg:leading-8">
        <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out rounded-md bg-opacity-20 bg-teal"></span>
        <span>{{ text }}</span>
    </li>
</template>

<script>
export default {
    props: [
        'completable',
        'initCompleted',
        'id',
        'text',
        'type',
    ],
}
</script>