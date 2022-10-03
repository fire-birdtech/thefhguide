<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { DocumentPlusIcon, EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { ArchiveBoxIcon, PencilSquareIcon as PencilSquareIconSolid, PlusCircleIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import SecondaryButton from '@/Components/SecondaryButton';
import DangerModal from '@/Components/Modals/DangerModal.vue';
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown.vue';

const props = defineProps({
    choice: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.choices.destroy', [props.choice.id]));
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
</script>

<template>
    <Head :title="`Admin - Choices - ${choice.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Choice Details: {{ choice.name }} </h3>
                </div>
                <div class="ml-4">
                    <SecondaryButtonWithDropdown button-text="Options" :actions="actions" @open="open = true" />
                </div>
            </div>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3"> {{ choice.name }} </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Goal</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                            <Link class="hover:text-gray-600" :href="route('editor.goals.show', [choice.goal.slug])"> {{ choice.goal.name }} </Link>
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Summary</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.summary" />
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Instructions</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.instructions" />
                    </div>
                    <div v-if="choice.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Resources</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.resources" />
                    </div>
                    <div v-if="choice.review" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Review</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.review" />
                    </div>
                    <div v-if="choice.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Exercises</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.exercises" />
                    </div>
                </dl>
            </div>
        </div>

        <DangerModal :open="open" action-text="Delete" emit-name="delete" @close="close" @delete="destroy">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete choice </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete {{ choice.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DangerModal>
    </AdminLayout>
</template>