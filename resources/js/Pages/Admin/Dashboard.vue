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
                <div v-if="editors.length" class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <AdminDashboardEditorCard v-for="editor in editors" :key="editor.id" :editor="editor" />
                </div>
                <NoEditors v-else />
            </div>
        </div>
    </AdminLayout>
</template>