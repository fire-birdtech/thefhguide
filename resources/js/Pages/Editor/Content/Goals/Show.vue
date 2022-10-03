<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { DocumentPlusIcon, EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { ArchiveBoxIcon, PencilSquareIcon as PencilSquareIconSolid, PlusCircleIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from  '@/Layouts/Admin';
import DangerModal from '@/Components/Modals/DangerModal.vue';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown.vue';

const props = defineProps({
    goal: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.goals.destroy', [props.goal.slug]));
}

const actions = [
    [
        { name: 'Edit', as: 'link', icon: PencilSquareIconSolid, href: route('editor.goals.edit', [props.goal.slug]) },
        { name: 'Add Assignment', as: 'link', icon: PlusCircleIcon, href: `${route('admin.assignments.create')}?assignable_id=${props.goal.id}&assignable_type=goal` }
    ],
    [
        { name: 'Archive', as: 'emitter', icon: ArchiveBoxIcon, emit: 'open' }
    ]
];
const cells = {
    name: 'Name'
}
</script>

<template>
    <Head :title="`Admin - Goals - ${goal.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Goal Details: {{ goal.name }} </h3>
                    </div>
                    <div class="ml-4">
                        <SecondaryButtonWithDropdown button-text="Options" :actions="actions" @open="open = true" />
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ goal.name }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Summary</dt>
                            <dd class="mt-1 prose prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="goal.summary" />
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">"Show Me" Video</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ goal.show_me_video_url }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Project</dt>
                            <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                <Link class="hover:text-gray-600" :href="route('editor.projects.show', [goal.project.slug])"> {{ goal.project.name }} </Link>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="mt-12">
                    <TableHeader header="Choices" addText="Add choice" :addLink="`${route(`editor.choices.create`)}?goal=${goal.id}`" />
                    <Table class="mt-2">
                        <TableHead :cells="cells" :actions="true" />
                        <TableBody :cells="cells" :rows="goal.choices" routeType="editor.choices" :actions="true" />
                    </Table>
                </div>
            </div>
        </div>

        <Teleport to="body">
            <DangerModal :open="open" action-text="Delete" emit-name="delete" @close="close" @delete="destroy">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete goal </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to delete {{ goal.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
                </div>
            </DangerModal>
        </Teleport>
    </AdminLayout>
</template>