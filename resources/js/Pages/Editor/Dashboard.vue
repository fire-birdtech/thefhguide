<script setup>
import { computed } from 'vue';
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Badge from '@/Components/Badge.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';

defineProps({
    assignments: Array
});

const cells = {
    summary: 'Summary',
    status: 'Status',
    assignable: 'Belongs to',
    created_at: 'Created'
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

            <div class="mt-6">
                <TableHeader header="Assignments" />
                <Table class="mt-2">
                    <TableHead :cells="cells" :actions="false" />
                    <TableBody :cells="cells" :rows="assignments" routeType="assignments" :actions="false" />
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>