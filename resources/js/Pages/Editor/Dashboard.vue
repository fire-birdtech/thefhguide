<script setup>
import { computed } from 'vue';
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Badge from '@/Components/Badge.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';
import DraftList from '@/Components/Drafts/DraftList.vue';
import NoAssignments from '@/Components/EmptyStates/EditorDashboard.vue';

defineProps({
    assignments: Array,
    drafts: Array
});

const cells = {
    assignable: 'Belongs to',
    type: 'Type',
    status: 'Status',
    created_at: 'Created'
}

const tableActions = {
    view: true,
    edit: false
}
</script>

<template>

    <Head title="Editor Dashboard" />

    <AdminLayout>
        <div class="flex-1 px-4 py-8 sm:px-6 lg:px-8">
            <header>
                <div class="mx-auto">
                    <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900">Welcome, {{ $page.props.auth.user.name.split(' ')[0] }}</h2>
                </div>
            </header>

            <div v-if="assignments.length" class="mt-6">
                <TableHeader header="Assignments" />
                <Table class="mt-2">
                    <TableHead :cells="cells" :actions="true" />
                    <TableBody :cells="cells" :rows="assignments" routeType="editor.assignments" :actions="tableActions" />
                </Table>
            </div>

            <div v-if="drafts.length" class="mt-6">
                <h3 class="leading-6 font-medium text-gray-900"> Drafts </h3>
                <div class="mt-2">
                    <DraftList :drafts="drafts" />
                </div>
            </div>

            <NoAssignments v-if="! assignments.length && ! drafts.length" />
        </div>
    </AdminLayout>
</template>