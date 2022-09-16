<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import SecondaryButton from '@/Components/SecondaryButton';
import { EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import DeleteModal from '@/Components/DeleteModal';
import { DialogTitle } from '@headlessui/vue';

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
</script>

<template>
    <Head :title="`Admin - ${collection.name}`" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Collection Details: {{ collection.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButton @click="open = true">
                            <TrashIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Delete {{ collection.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton :href="route('editor.collections.edit', [collection.slug])" as="link">
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
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Projects</h3>
                    </div>
                </div>
                <div class="mt-4 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Manage</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr v-for="(project, projectIdx) in collection.projects" :key="project.id" :class="projectIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                                <Link :href="route('editor.projects.show', [project.slug])">{{ project.name }}</Link>
                                            </td>
                                            <td class="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                                                <Link :href="route('editor.projects.show', [project.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                    <EyeIcon class="h-6 w-6" />
                                                    <span class="sr-only">View {{ project.name }}</span>
                                                </Link>
                                                <Link :href="route('editor.projects.edit', [project.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                    <PencilSquareIcon class="h-6 w-6" />
                                                    <span class="sr-only">Edit {{ project.name }}</span>
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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