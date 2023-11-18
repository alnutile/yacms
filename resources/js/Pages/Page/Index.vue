<script setup>
import AppLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    pages: String,
    title: String
});

</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ title }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 dark:text-gray-300">
            </div>
        </div>
    </AppLayout>
</template>
