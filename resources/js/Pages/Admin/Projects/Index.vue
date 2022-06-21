<script setup>
import AdminLayout from '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton';
import { EyeIcon, PencilAltIcon } from '@heroicons/vue/outline';

defineProps({
    projects: Array,
})
</script>

<template>
    <Head title="Admin - Projects" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Projects</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <PrimaryButton :href="route('admin.projects.create')" as="link">Add project</PrimaryButton>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Belongs to</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Manage</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr v-for="(project, projectIdx) in projects" :key="project.id.email" :class="projectIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                            <Link :href="route('admin.projects.show', [project.slug])">{{ project.name }}</Link>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ project?.projectable?.name }}</td>
                                        <td class="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                                            <Link :href="route('admin.projects.show', [project.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                <EyeIcon class="h-6 w-6" />
                                                <span class="sr-only">View {{ project.name }}</span>
                                            </Link>
                                            <Link :href="route('admin.projects.edit', [project.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                <PencilAltIcon class="h-6 w-6" />
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
    </AdminLayout>
</template>