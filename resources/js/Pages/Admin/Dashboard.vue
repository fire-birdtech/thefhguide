<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/vue3';
import AdminDashboardEditorCard from '@/Components/Cards/AdminDashboardEditorCard.vue';
import NoEditors from '@/Components/EmptyStates/NoEditors.vue';
import Header3 from '@/Components/Headers/Header3.vue';
import DraftList from '@/Components/Drafts/DraftList.vue';

defineProps({
    editors: Array,
    drafts: Array
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div v-if="editors.length">
                    <Header3> My Editors </Header3>
                    <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 2xl:grid-cols-3">
                        <AdminDashboardEditorCard v-for="editor in editors" :key="editor.id" :editor="editor" />
                    </div>
                </div>
                <NoEditors v-else />
            </div>

            <div v-if="drafts.length" class="mt-6">
                <Header3> My Drafts </Header3>
                <div class="mt-4">
                    <DraftList :drafts="drafts" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>