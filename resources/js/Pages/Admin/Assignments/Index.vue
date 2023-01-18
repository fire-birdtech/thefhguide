<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import Badge from '@/Components/Badge.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';
import NoAssignments from '@/Components/EmptyStates/NoAssignments.vue';

defineProps({
    assignments: Array,
});

const cells = {
    assignable: 'Belongs to',
    type: 'Type',
    user: 'Assigned Editor',
    status: 'status'
}

const tableActions = {
    view: true,
    edit: true
}
</script>

<template>
    <Head title="Assignments" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <template v-if="assignments">
                <TableHeader header="Assignments" />
                <Table class="mt-2">
                    <TableHead :cells="cells" :actions="true" />
                    <TableBody :cells="cells" :rows="assignments" routeType="editor.assignments" adminRouteType="admin.assignments" :actions="tableActions" />
                </Table>
            </template>
            <NoAssignments v-else />
        </div>
    </AdminLayout>
</template>