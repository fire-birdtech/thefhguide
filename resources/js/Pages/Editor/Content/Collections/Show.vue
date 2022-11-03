<script setup>
import { computed, ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { ArchiveBoxIcon, PencilSquareIcon, PlusCircleIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import DangerModal from '@/Components/Modals/DangerModal';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown.vue';

const props = defineProps({
    collection: Object,
    errors: Object,
    success: Object
});

let sortedProjects = computed(() => props.collection.projects.sort((a, b) => a.order - b.order));

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.collections.destroy', [props.collection.slug]));
}

const updateOrder = (updated_project, sibling_project) => {
    let updateForm = useForm({
        _method: "PUT",
        updated_project,
        sibling_project
    });

    updateForm.post(route('editor.projects.update-order', [updated_project]), {
        preserveScroll: true
    });
}

const moveDown = (orderNumber) => {
    let index = sortedProjects.value.findIndex(project => project.order === orderNumber);

    sortedProjects.value[index].order++;
    sortedProjects.value[index + 1].order--;

    updateOrder(sortedProjects.value[index + 1], sortedProjects.value[index]);
}
const moveUp = (orderNumber) => {
    let index = sortedProjects.value.findIndex(project => project.order === orderNumber);

    sortedProjects.value[index].order--;
    sortedProjects.value[index - 1].order++;

    updateOrder(sortedProjects.value[index - 1], sortedProjects.value[index]);
}

const actions = [
    [
        { name: 'Edit', as: 'link', icon: PencilSquareIcon, href: route('editor.collections.edit', [props.collection.slug]) }
    ],
    [
        { name: 'Archive', as: 'emitter', icon: ArchiveBoxIcon, emit: 'open' }
    ]
];
const cells = {
    name: 'Name'
}

const tableActions = {
    view: true,
    edit: true
}
</script>

<template>
    <Head :title="`Admin - ${collection.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Collection Details: {{ collection.name }} </h3>
                    </div>
                    <div class="ml-4">
                        <SecondaryButtonWithDropdown button-text="Options" :actions="actions" @open="open = true" />
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
                    <TableHead :cells="cells" :actions="true" :order="true" />
                    <TableBody :cells="cells" :rows="sortedProjects" routeType="editor.projects" :actions="tableActions" :order="true" @down="moveDown($event)" @up="moveUp($event)" />
                </Table>
            </div>
        </div>

        <Teleport to="body">
            <DangerModal :open="open" action-text="Archive" emit-name="delete" @close="close" @delete="destroy">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Archive collection </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to archive {{ collection.name }}?</p>
                </div>
            </DangerModal>
        </Teleport>
    </AdminLayout>
</template>