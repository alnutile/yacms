<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Footer from "@/Components/Footer.vue";
import TopNav from "@/Components/TopNav.vue";
defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <TopNav/>
            <main>
                <slot />
            </main>
            <Footer/>
        </div>
    </div>
</template>
