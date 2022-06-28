<script setup>
import { ref } from 'vue';
import AdminLayout from  '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import { ClipboardListIcon, EyeIcon, PencilAltIcon, TrashIcon } from '@heroicons/vue/outline';
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
    Inertia.delete(route('admin.goals.destroy', [props.goal.slug]));
}
</script>

<template>
    <Head :title="`Admin - Goals - ${goal.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Goal Details: {{ goal.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButton @click="open = true" title="Delete goal">
                            <TrashIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Delete {{ goal.name }}</span>
                        </SecondaryButton>
                        <SecondaryButton :href="route('admin.goals.edit', [goal.slug])" as="link" title="Edit goal">
                            <PencilAltIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Edit {{ goal.name }}</span>
                        </SecondaryButton>
                        <PrimaryButton :href="route('admin.projects.show', [goal.project.slug])" as="link" title="Go to project">
                            <ClipboardListIcon class="h-5 w-5" aria-hidden="true" />
                            <span class="sr-only">Go to project</span>
                        </PrimaryButton>
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
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="goal.summary" />
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">"Show Me" Video</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ goal.show_me_video_url }} </dd>
                        </div>
                    </dl>
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