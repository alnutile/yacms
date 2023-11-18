<template>

    <nav aria-label="Paginated Posts" class="flex justify-between w-full mx-auto items-center max-w-7xl">
        <div class="text-gray-500 font-semibold">
            Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }}
        </div>
        <ul class="inline-flex -space-x-px text-base h-10 ">
            <li v-for="(page, index) in meta.links" :key="page">
                <Link v-if="index === 0"
                      :href="page.url"
                      v-html="page.label"
                      class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                </Link>
                <Link v-else-if="index === (meta.links.length - 1)"
                      :href="page.url"
                      class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                      v-html="page.label"
                >
                </Link>
                <Link
                    v-else
                    :href="page.url"
                    :class="{ 'text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : page.active }"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                v-html="page.label">
                </Link>
            </li>

        </ul>
    </nav>

</template>

<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    links: Object,
    meta: Object
})



</script>

<style scoped>

</style>
