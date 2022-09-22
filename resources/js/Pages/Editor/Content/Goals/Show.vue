<script setup>
import { ref } from 'vue';
import AdminLayout from  '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import { ClipboardDocumentListIcon, DocumentPlusIcon, EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import DeleteModal from '@/Components/DeleteModal';
import { DialogTitle } from '@headlessui/vue';

const props = defineProps({
    goal: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('editor.goals.destroy', [props.goal.slug]));
}
</script>

<template>
    <Head :title="`Admin - Goals - ${goal.name}`" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Goal Details: {{ goal.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButton :href="`${route('admin.assignments.create')}?assignable_id=${goal.id}&assignable_type=goal`" as="link">
                            <DocumentPlusIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Add assignment to {{ goal.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton @click="open = true" title="Delete goal">
                            <TrashIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Delete {{ goal.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton :href="route('editor.goals.edit', [goal.slug])" as="link" title="Edit goal">
                            <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Edit {{ goal.name }}</span>
                        </SecondaryButton>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ goal.name }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Summary</dt>
                            <dd class="mt-1 prose prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="goal.summary" />
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">"Show Me" Video</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ goal.show_me_video_url }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Project</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                            <Link class="hover:text-gray-600" :href="route('editor.projects.show', [goal.project.slug])"> {{ goal.project.name }} </Link>
                        </dd>
                    </div>
                    </dl>
                </div>
                <div class="mt-12">
                    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                        <div class="ml-4 mt-2">
                            <h3 class="text-lg leading-6 font-medium text-gray-900"> Choices </h3>
                        </div>
                        <div class="ml-4 mt-2 space-x-2">
                            <PrimaryButton :href="`${route('editor.choices.create')}?goal=${goal.id}`" as="link"> Add choice </PrimaryButton>
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
                                            <tr v-for="(choice, choiceIdx) in goal.choices" :key="choice.id" :class="choiceIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                                    <Link :href="route('editor.choices.show', [choice.id])">{{ choice.name }}</Link>
                                                </td>
                                                <td class="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                                                    <Link :href="route('editor.choices.show', [choice.id])" class="text-indigo-600 hover:text-indigo-900">
                                                        <EyeIcon class="h-6 w-6" />
                                                        <span class="sr-only">View {{ choice.name }}</span>
                                                    </Link>
                                                    <Link :href="route('editor.choices.edit', [choice.id])" class="text-indigo-600 hover:text-indigo-900">
                                                        <PencilSquareIcon class="h-6 w-6" />
                                                        <span class="sr-only">Edit {{ choice.name }}</span>
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
        </div>

        <DeleteModal :open="open" @close="close" @delete="destroy">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete goal </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete {{ goal.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DeleteModal>
    </AdminLayout>
</template>