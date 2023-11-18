<template>
    <h2 class="mr-2 font-bold text-gray-800">Tags:</h2>
    <div
        class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300"
        v-for="tag in tags" :key="tag.id">{{ tag.name['en'] }}
    </div>
</template>

<script setup>
const props = defineProps({
    tags: Object
})
</script>

<style scoped>

</style>
