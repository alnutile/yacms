<template>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a :href="$page.props.app_url" class="flex items-center">
                    <img :src="$page.props.logo" class="mr-3 h-6 sm:h-9" :alt="$page.props.app_name" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                        {{ $page.props.app_name }}
                    </span>
                </a>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <Link :href="route('home')"
                                  :class="{  'underline'  : route().current('home') }"
                                  class="block py-2 pr-4 pl-3 text-gray-500 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">
                                Home
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('pages.index')"
                                  :class="{  'underline'  : route().current('pages.index') }"
                                  class="block py-2 pr-4 pl-3 text-gray-500 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">
                                Posts
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('about')"
                                  :class="{  'underline'  : route().current('about') }"
                                  class="block py-2 pr-4 pl-3 text-gray-500  rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">
                                About
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

</script>

<style scoped>

</style>
