<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/Admin';
import { Head } from '@inertiajs/inertia-vue3';
import SecondaryButton from '@/Components/SecondaryButton';
import { PencilAltIcon, TrashIcon } from '@heroicons/vue/outline';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { ExclamationIcon, XIcon } from '@heroicons/vue/outline';
import DangerButton from '@/Components/DangerButton';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    partner: Object,
});

const open = ref(false);

const destroy = () => {
    Inertia.delete(route('admin.partners.destroy', [props.partner.slug]));
}
</script>

<template>
    <Head :title="`Admin - ${partner.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Partner Details: {{ partner.name }} </h3>
                </div>
                <div class="ml-4 mt-2 space-x-2">
                    <SecondaryButton @click="open = true">
                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Delete {{ partner.name }}</span>
                    </SecondaryButton>
                    <SecondaryButton :href="route('admin.partners.edit', [partner.slug])" as="link">
                        <PencilAltIcon class="h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Edit {{ partner.name }}</span>
                    </SecondaryButton>
                </div>
            </div>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ partner.name }} </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Website URL</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ partner.website_url }} </dd>
                    </div>
                </dl>
            </div>
        </div>

        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="relative z-10" @close="open = false">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <div class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                            <DialogPanel class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full sm:p-6">
                                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                    <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="open = false">
                                        <span class="sr-only">Close</span>
                                        <XIcon class="h-6 w-6" aria-hidden="true" />
                                    </button>
                                </div>
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete partner </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to delete {{ partner.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                    <DangerButton @click="destroy" class="sm:ml-3"> Delete </DangerButton>
                                    <SecondaryButton class="mt-3 sm:mt-0" @click="open = false">Cancel</SecondaryButton>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </AdminLayout>
</template>