<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/Admin';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import { ClipboardListIcon, EyeIcon, PencilAltIcon, TrashIcon } from '@heroicons/vue/outline';
import { Inertia } from '@inertiajs/inertia';
import DeleteModal from '@/Components/DeleteModal';
import { DialogTitle } from '@headlessui/vue';

const props = defineProps({
    choice: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}
const destroy = () => {
    Inertia.delete(route('admin.choices.destroy', [props.choice.id]));
}
</script>

<template>
    <Head :title="`Admin - Choices - ${choice.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Choice Details: {{ choice.name }} </h3>
                </div>
                <div class="ml-4 mt-2 space-x-2">
                    <SecondaryButton @click="open = true" title="Delete choice">
                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Delete {{ choice.name }}</span>
                    </SecondaryButton>
                    <SecondaryButton :href="route('admin.choices.edit', [choice.id])" as="link" title="Edit choice">
                        <PencilAltIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Edit {{ choice.name }}</span>
                    </SecondaryButton>
                    <PrimaryButton :href="route('admin.goals.show', [choice.goal.slug])" as="link" title="Go to goal">
                        <ClipboardListIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Go to project</span>
                    </PrimaryButton>
                </div>
            </div>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3"> {{ choice.name }} </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Summary</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.summary" />
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Instructions</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.instructions" />
                    </div>
                    <div v-if="choice.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Resources</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.resources" />
                    </div>
                    <div v-if="choice.review" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Review</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.review" />
                    </div>
                    <div v-if="choice.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Exercises</dt>
                        <dd class="mt-1 prose text-sm text-gray-900 sm:-my-4 sm:col-span-3" v-html="choice.exercises" />
                    </div>
                </dl>
            </div>
        </div>

        <DeleteModal :open="open" @close="close" @delete="destroy">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete choice </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete {{ choice.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DeleteModal>
    </AdminLayout>
</template>