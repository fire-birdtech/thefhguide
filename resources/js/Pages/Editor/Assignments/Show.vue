<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import { DocumentCheckIcon } from '@heroicons/vue/24/outline';
import PrimaryButtonWithDropdown from '@/Components/Buttons/PrimaryButtonWithDropdown.vue';
import Badge from '@/Components/Badge.vue';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    assignment: Object
});

const options = [
    { name: 'Mark Complete', icon: DocumentCheckIcon, show: true, action: 'complete' },
];

const complete = () => {
    router.put(route('editor.assignments.mark-complete', [props.assignment.id]));
}
</script>

<template>
    <Head title="Assignment" />

    <AdminLayout>
        <div class="w-full px-4 py-8 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <Header3> Assignment Details </Header3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <PrimaryButtonWithDropdown
                            :href="route(`editor.${assignment.assignable_type.split('\\')[2].toLowerCase()}s.show`, [assignment.assignable.id])"
                            :action="`Go to ${assignment.assignable_type.split('\\')[2]}`"
                            v-if="!assignment.completed_at"
                            :options="options"
                            @complete="complete" />
                    </div>
                </div>

                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Belongs to</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ assignment.assignable.name }} </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1s sm:mt-0 sm:col-span-2">
                                <Badge :text="assignment.status" />
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Assigned</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ assignment.user.name }} </dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-3 ml-4 flex flex-col space-y-1">
                    <small class="text-gray-500">
                        Created: {{ new Date(assignment.created_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}
                    </small>
                    <small v-if="assignment.updated_at !== assignment.created_at" class="text-gray-500">
                        Updated: {{ new Date(assignment.updated_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}
                    </small>
                    <small v-if="assignment.completed_at" class="text-gray-500">
                        Completed: {{ new Date(assignment.completed_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}
                    </small>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>