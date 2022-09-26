<script setup>
import { computed } from 'vue';
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Badge from '@/Components/Badge.vue'

defineProps({
    assignments: Array
});
</script>

<template>

    <Head title="Editor Dashboard" />

    <AdminLayout>
        <div class="flex-1 px-4 py-8 sm:px-6 lg:px-8">
            <header>
                <div class="mx-auto">
                    <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900">Welcome, {{ $page.props.auth.user.name.split(' ')[0] }}</h2>
                </div>
            </header>

            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="col-span-2">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h3 class="font-medium tracking-wide text-gray-700">Assignments</h3>
                        </div>
                    </div>
                    <div class="mt-3 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Summary</th>
                                                <th scope="col" class="px-3 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
                                                <th scope="col" class="px-3 py-3 text-left text-sm font-semibold text-gray-900">Belongs to</th>
                                                <th scope="col" class="px-3 py-3 text-left text-sm font-semibold text-gray-900">Created</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            <tr v-for="(assignment, assignmentIdx) in assignments" :key="assignment.id" :class="assignmentIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                                    <Link :href="route('editor.assignments.show', [assignment.id])">{{ assignment.summary }}</Link>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <Badge :status="assignment.status" />
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ assignment.assignable.name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ new Date(assignment.created_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>