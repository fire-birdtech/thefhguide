<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { DocumentPlusIcon, EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import DeleteModal from '@/Components/DeleteModal';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';

const props = defineProps({
    project: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.projects.destroy', [props.project.slug]));
}

const cells = {
    name: 'Name'
}
</script>

<template>
    <Head :title="`Admin - Projects - ${project.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Project Details: {{ project.name }} </h3>
                </div>
                <div class="ml-4 mt-2 space-x-2">
                    <SecondaryButton :href="`${route('admin.assignments.create')}?assignable_id=${project.id}&assignable_type=project`" as="link">
                        <DocumentPlusIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Add assignment to {{ project.name }}</span>
                    </SecondaryButton>
                    <SecondaryButton @click="open = true" :locked="project.locked">
                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Delete {{ project.name }}</span>
                    </SecondaryButton>
                    <SecondaryButton :href="route('editor.projects.edit', [project.slug])" :locked="project.locked" as="link">
                        <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Edit {{ project.name }}</span>
                    </SecondaryButton>
                </div>
            </div>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ project.name }} </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Belongs to</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                            <Link class="hover:text-gray-600" :href="route('editor.collections.show', [project.collection.slug])"> {{ project.collection.name }} </Link>
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="mt-12">
                <TableHeader header="Goals" addText="Add goal" :addLink="`${route(`editor.goals.create`)}?project=${project.id}`" />
                <Table class="mt-2">
                    <TableHead :cells="cells" :actions="true" />
                    <TableBody :cells="cells" :rows="project.goals" routeType="goals" :actions="true" />
                </Table>
            </div>
        </div>

        <DeleteModal :open="open" @close="close" @delete="destroy">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete project </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete {{ project.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DeleteModal>
    </AdminLayout>
</template>