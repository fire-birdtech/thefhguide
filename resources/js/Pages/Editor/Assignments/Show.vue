<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import Badge from '@/Components/Badge.vue';

const props = defineProps({
    assignment: Object
});

const form = useForm({
    assignmentId: props.assignment.id
});

const submit = () => {
    form.post(route('editor.drafts.store'));
}
</script>

<template>
    <Head title="Assignment" />

    <AdminLayout>
        <div class="w-full px-4 py-8 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Assignment Details </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <template v-if="assignment.draft">
                            <PrimaryButton v-if="assignment.status === 'started'" :href="route('editor.drafts.edit', [assignment.draft?.id])" as="link">
                                Continue Assignment
                            </PrimaryButton>
                        </template>
                        <template v-else>
                            <PrimaryButton @click="submit">
                                Start Assignment
                            </PrimaryButton>
                        </template>
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
                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ new Date(assignment.created_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Assigned</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ assignment.user.name }} </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>