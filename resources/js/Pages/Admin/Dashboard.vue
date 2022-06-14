<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Admin
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>