<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/inertia-vue3';
import AdminDashboardEditorCard from '@/Components/Cards/AdminDashboardEditorCard.vue';
import NoEditors from '@/Components/EmptyStates/NoEditors.vue';

defineProps({
    editors: Array
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div v-if="editors.length">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> My Editors </h3>
                    <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 2xl:grid-cols-3">
                        <AdminDashboardEditorCard v-for="editor in editors" :key="editor.id" :editor="editor" />
                    </div>
                </div>
                <NoEditors v-else />
            </div>
        </div>
    </AdminLayout>
</template>