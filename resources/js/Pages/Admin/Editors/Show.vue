<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import SecondaryButton from '@/Components/SecondaryButton';
import { PencilSquareIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
});
</script>

<template>
    <Head :title="`Admin - ${user.name}`" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Editor Details: {{ user.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButton :href="route('admin.editors.edit', [user.id])" as="link" title="Edit user">
                            <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Edit {{ user.name }}</span>
                        </SecondaryButton>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ user.name }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ user.email }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800"> {{ user.roles[0].name }} </span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>