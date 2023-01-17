<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import StackedList from '@/Components/StackedList.vue';
import ContentStackedListItem from '@/Components/ContentStackedListItem.vue';

defineProps({
    collections: Array,
    projects: Array,
});
</script>

<template>
    <Head title="Admin Content" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Project Collections </h3>
            <ul role="list" class="mt-4 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
                <li v-for="collection in collections" :key="collection.id" class="col-span-1 border-2 border-transparent flex flex-col items-center justify-center rounded-lg bg-white text-center shadow hover:border-blue-400 hover:bg-blue-50">
                    <Link class="p-6" :href="route('editor.collections.show', [collection.slug])">
                        <div class="flex flex-1 flex-col">
                            <h3 class="text-sm font-medium text-gray-900">{{ collection.name }}</h3>
                        </div>
                    </Link>
                </li>
            </ul>

            <div class="mt-10 grid grid-cols-2 gap-x-8">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Projects</h3>
                    <StackedList class="mt-5">
                        <ContentStackedListItem v-for="project in projects" :key="project.id" :name="project.name" :parent="project.collection.name" :date="project.updated_at" :href="route('editor.projects.show', [project.slug])" />
                    </StackedList>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>