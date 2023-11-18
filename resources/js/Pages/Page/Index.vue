<script setup>
import AppLayout from '@/Layouts/GuestLayout.vue';
import {Link, useForm} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import Tags from "@/Components/Tags.vue";

const props = defineProps({
    pages: String,
    title: String,
    search: String,
});

const form = useForm(
    {
        search: props.search
    }
)


const searchIt = () => {
    form.get(route("pages.index"), {
        preserveScroll: true
    })
}
</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ title }}
            </h2>
        </template>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 dark:text-gray-300 bg-white dark:bg-gray-900 mb-10 mt-10">
                <div>

                    <form>
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <form @submit.prevent="searchIt">
                                <input
                                    autofocus
                                    autocomplete="off"
                                    v-model="form.search"
                                    type="search"
                                    id="default-search"
                                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Posts..." required>
                                <div class="absolute end-2.5 bottom-2.5  flex justify-end gap-2 items-center">
                                    <button type="submit"
                                            class="text-white  end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    <Link :href="route('pages.index')"
                                          class="text-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset</Link>
                                </div>
                            </form>
                        </div>
                    </form>

                </div>

                <div v-for="(page, index) in pages.data" :key="page.id">
                    <section class="">
                        <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-12 sm:py-16 lg:px-6">
                            <div class="w-full h-[300px] col-span-4" v-if="index % 2 === 0">
                                <img class="w-full h-full object-contain" :src="page.image" alt="dashboard image">
                            </div>
                            <div class="mt-4 md:mt-0 mx-auto h-full w-full relative  col-span-8">
                                <div class="flex justify-between mx-auto items-center mb-4 ">
                                    <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ page.title }}</h2>
                                    <div class="flex justify-between">
                                        <Tags :tags="page.tags"/>
                                    </div>
                                </div>
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

                <Pagination :links="pages.links" :meta="pages.meta"/>
            </div>
    </AppLayout>
</template>
