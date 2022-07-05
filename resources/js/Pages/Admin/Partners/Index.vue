<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton';
import { EyeIcon, PencilAltIcon } from '@heroicons/vue/outline';

defineProps({
    partners: Array,
});
</script>

<template>
    <Head title="Admin Partners" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Partners</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the partners including their name and website url.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <PrimaryButton :href="route('admin.partners.create')" as="link">Add partner</PrimaryButton>
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
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Website URL</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Manage</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr v-for="(partner, partnerIdx) in partners" :key="partner.id.email" :class="partnerIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                            <Link :href="route('admin.partners.show', [partner.slug])">{{ partner.name }}</Link>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ partner.website_url }}</td>
                                        <td class="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                                            <Link :href="route('admin.partners.show', [partner.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                <EyeIcon class="h-6 w-6" />
                                                <span class="sr-only">View {{ partner.name }}</span>
                                            </Link>
                                            <Link :href="route('admin.partners.edit', [partner.slug])" class="text-indigo-600 hover:text-indigo-900">
                                                <PencilAltIcon class="h-6 w-6" />
                                                <span class="sr-only">Edit {{ partner.name }}</span>
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