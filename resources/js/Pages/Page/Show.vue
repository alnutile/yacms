<script setup>
import AppLayout from '@/Layouts/GuestLayout.vue';
import Tags from "@/Components/Tags.vue";

defineProps({
    page: String,
    title: String,
    tags: Array
});

</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ title }}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 dark:text-gray-300 bg-white dark:bg-gray-900 mb-10 mt-10">

            <div class="flex gap-2 justify-between">
                <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ title }}
                </h1>
                <div class="flex items-center">
                    <Tags :tags="tags"/>
                </div>
            </div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 dark:text-gray-300  prose" v-html="page">
            </div>
        </div>
    </AppLayout>

</template>
