<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ErrorLayout from '@/Layouts/Error.vue';
</script>

<template>
    <ErrorLayout>
        <Head title="Page Expired" />

        <div class="max-w-max mx-auto">
            <main class="sm:flex">
                <p class="text-4xl font-extrabold text-blue-600 sm:text-5xl">404</p>
                <div class="sm:ml-6">
                    <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Page not found</h1>
                        <p class="mt-2 text-base text-gray-500">This page has expired. Please request the invitation to be resent.</p>
                    </div>
                    <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                        <Link :href="route('home')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> Go to home </Link>
                    </div>
                </div>
            </main>
        </div>
    </ErrorLayout>
</template>