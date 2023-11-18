<script setup>
import AppLayout from '@/Layouts/GuestLayout.vue';
import { Link } from "@inertiajs/vue3";

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
                <div v-for="(page, index) in pages.data" :key="page.id">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-12 sm:py-16 lg:px-6">
                            <div class="w-full h-[300px] col-span-4" v-if="index % 2 === 0">
                                <img class="w-full h-full object-contain" :src="page.image" alt="dashboard image">
                            </div>
                            <div class="mt-4 md:mt-0 mx-auto h-full w-full relative  col-span-8">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ page.title }}</h2>
                                <div v-html="page.intro"></div>
                                <Link :href="page.url"
                                      :class="{'right-0' : index % 2 === 0 }"
                                      class="
                                absolute bottom-0
                                inline-flex items-center text-pink-50 bg-pink-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                    Read More
                                </Link>
                            </div>
                            <div class="w-full h-[300px] col-span-4" v-if="index % 2 !== 0">
                                <img class="w-full h-full object-contain" :src="page.image" alt="dashboard image">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
