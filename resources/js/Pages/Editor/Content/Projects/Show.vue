<script setup>
import { computed, ref } from 'vue';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { DocumentPlusIcon, EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { ArchiveBoxIcon, PencilSquareIcon as PencilSquareIconSolid, PlusCircleIcon } from '@heroicons/vue/24/solid';
import { router } from '@inertiajs/vue3';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import DangerModal from '@/Components/Modals/DangerModal.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall.vue';
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown.vue';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    errors: Object,
    project: Object,
});

let sortedGoals = computed(() => props.project.goals.sort((a, b) => a.order - b.order));

const open = ref(false);

const close = () => {
    open.value = false;
}

const showPreview = ref(false);

const destroy = () => {
    router.delete(route('editor.projects.destroy', [props.project.slug]));
}

const updateOrder = (updated_goal, sibling_goal) => {
    let updateForm = useForm({
        _method: "PUT",
        updated_goal,
        sibling_goal
    });

    updateForm.post(route('editor.goals.update-order', [updated_goal]), {
        preserveScroll: true,
    });
}

const moveDown = (orderNumber) => {
    let index = sortedGoals.value.findIndex(goal => goal.order === orderNumber);

    sortedGoals.value[index].order++;
    sortedGoals.value[index + 1].order--;

    updateOrder(sortedGoals.value[index + 1], sortedGoals.value[index]);
}
const moveUp = (orderNumber) => {
    let index = sortedGoals.value.findIndex(goal => goal.order === orderNumber);

    sortedGoals.value[index].order--;
    sortedGoals.value[index - 1].order++;

    updateOrder(sortedGoals.value[index - 1], sortedGoals.value[index]);
}

const actions = [
    [
        { name: 'Edit', as: 'link', icon: PencilSquareIconSolid, href: route('editor.projects.edit', [props.project.slug]) }
    ],
    [
        { name: 'Archive', as: 'emitter', icon: ArchiveBoxIcon, emit: 'open' }
    ]
];
const goalCells = {
    name: 'Name'
}
const draftCells = {
    name: 'Name',
    user: 'Author',
    updated_at: 'Last Updated'
}
const tableActions = {
    view: true,
    edit: true
}
</script>

<template>
    <Head :title="`Admin - Projects - ${project.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <Header3> Project Details: {{ project.name }} </Header3>
                </div>
                <div class="ml-4">
                    <SecondaryButtonWithDropdown button-text="Options" :actions="actions" @open="open = true" />
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
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Cover Image</dt>
                        <dd v-if="project.cover_image_path" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <SecondaryButtonSmall @click="showPreview = true" class="-my-2 sm:-my-2.5">Show image</SecondaryButtonSmall>
                            <Teleport to="body">
                                <TransitionRoot as="template" :show="showPreview">
                                    <Dialog as="div" class="relative z-10" @close="showPreview = false">
                                        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                                        </TransitionChild>

                                        <div class="fixed inset-0 z-10 overflow-y-auto">
                                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                                    <DialogPanel class="relative transform block w-full h-full overflow-hidden rounded-lg bg-gray-600 text-left shadow-xl transition-all sm:w-full sm:max-w-4xl">
                                                        <img :src="project.cover_image_url" class="object-cover pointer-events-none">
                                                    </DialogPanel>
                                                </TransitionChild>
                                            </div>
                                        </div>
                                    </Dialog>
                                </TransitionRoot>
                            </Teleport>
                        </dd>
                        <dd v-else class="mt-1 text-sm text-gray-500 sm:mt-0 sm:col-span-2">No cover image available</dd>
                    </div>
                </dl>
            </div>
            <div class="mt-12">
                <TableHeader header="Goals" addText="Add goal" :add-route="route('editor.drafts.create', {type: 'goal', parent_id: project.id})" />
                <Table class="mt-2">
                    <TableHead :cells="goalCells" :actions="true" :order="true" />
                    <TableBody :cells="goalCells" :rows="sortedGoals" routeType="editor.goals" :actions="tableActions" :order="true" @down="moveDown($event)" @up="moveUp($event)" />
                </Table>
            </div>

            <div class="mt-12" v-if="project.child_drafts.length">
                <TableHeader header="Goal Drafts" />
                <Table class="mt-2">
                    <TableHead :cells="draftCells" :actions="true" />
                    <TableBody :cells="draftCells" :rows="project.child_drafts" routeType="editor.drafts" :actions="tableActions" />
                </Table>
            </div>
        </div>

        <Teleport to="body">
            <DangerModal :open="open" action-text="Archive" emit-name="delete" @close="close" @delete="destroy">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Archive project </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to archive {{ project.name }}?</p>
                </div>
            </DangerModal>
        </Teleport>
    </AdminLayout>
</template>