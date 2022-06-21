<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import SecondaryButton from '@/Components/SecondaryButton';
import { PencilAltIcon, TrashIcon } from '@heroicons/vue/outline';
import { Inertia } from '@inertiajs/inertia';
import DeleteModal from '@/Components/DeleteModal';
import { DialogTitle } from '@headlessui/vue';

const props = defineProps({
    project: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('admin.projects.destroy', [props.project.slug]));
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
                    <SecondaryButton @click="open = true">
                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Delete {{ project.name }}</span>
                    </SecondaryButton>
                    <SecondaryButton :href="route('admin.projects.edit', [project.slug])" as="link">
                        <PencilAltIcon class="h-5 w-5" aria-hidden="true" />
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
                            <Link class="hover:text-gray-600" :href="route('admin.partners.show', [project.projectable.slug])"> {{ project.projectable.name }} </Link>
                        </dd>
                    </div>
                </dl>
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