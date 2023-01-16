<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from  '@/Layouts/Admin.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

defineProps(['draft']);
</script>

<template>
    <Head :title="`Admin - Drafts - ${draft.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Draft Details: {{ draft.name }} </h3>
                    </div>
                    <div class="ml-4">
                        <PrimaryButton :href="route('editor.drafts.edit', [draft.id])" as="link">Edit</PrimaryButton>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ draft.name }} </dd>
                        </div>
                        <div v-if="['goal','choice'].includes(draft.draftable_type)" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Summary</dt>
                            <dd class="mt-1 prose max-w-3xl prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="draft.summary" />
                        </div>
                        <div v-if="draft.instructions" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Instructions</dt>
                            <dd class="mt-1 prose max-w-3xl prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="draft.instructions" />
                        </div>
                        <div v-if="draft.review" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Review</dt>
                            <dd class="mt-1 prose max-w-3xl prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="draft.review" />
                        </div>
                        <div v-if="draft.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Exercises</dt>
                            <dd class="mt-1 prose max-w-3xl prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="draft.exercises" />
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>