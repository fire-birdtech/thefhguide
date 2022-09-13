<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    collections: Array,
});
</script>

<template>
    <Head title="Admin Content" />

    <AdminLayout :type="$page.props.auth.user.roles[0]?.name">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <ul role="list" class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
                <li v-for="collection in collections" :key="collection.id" class="col-span-1 border border-transparent flex flex-col items-center justify-center rounded-lg bg-white text-center shadow hover:border-indigo-400">
                    <Link class="p-6" :href="route('admin.collections.show', [collection.slug])">
                        <div class="flex flex-1 flex-col">
                            <h3 class="text-sm font-medium text-gray-900">{{ collection.name }}</h3>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>
    </AdminLayout>
</template>