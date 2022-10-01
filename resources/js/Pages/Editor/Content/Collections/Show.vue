<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { DocumentPlusIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import DeleteModal from '@/Components/DeleteModal';
import SecondaryButton from '@/Components/SecondaryButton';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';

const props = defineProps({
    collection: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.collections.destroy', [props.collection.slug]));
}

const cells = {
    name: 'Name'
}
</script>

<template>
    <Head :title="`Admin - ${collection.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Collection Details: {{ collection.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButton :href="`${route('admin.assignments.create')}?assignable_id=${collection.id}&assignable_type=collection`" as="link">
                            <DocumentPlusIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Add assignment to {{ collection.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton @click="open = true" :locked="collection.locked">
                            <TrashIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Delete {{ collection.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton :href="route('editor.collections.edit', [collection.slug])" :locked="collection.locked" as="link">
                            <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Edit {{ collection.name }}</span>
                        </SecondaryButton>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ collection.name }} </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-12">
                <TableHeader header="Projects" addText="Add project" :addLink="`${route(`editor.projects.create`)}?collection=${collection.id}`" />
                <Table class="mt-2">
                    <TableHead :cells="cells" :actions="true" />
                    <TableBody :cells="cells" :rows="collection.projects" routeType="projects" :actions="true" />
                </Table>
            </div>
        </div>

        <DeleteModal :open="open" @close="close" @delete="destroy">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete collection </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete {{ collection.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DeleteModal>
    </AdminLayout>
</template>