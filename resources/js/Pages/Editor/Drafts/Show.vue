<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from  '@/Layouts/Admin.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import Header3 from '@/Components/Headers/Header3.vue';
import Header5 from '@/Components/Headers/Header5.vue';
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall.vue';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { ArrowTopRightOnSquareIcon } from '@heroicons/vue/24/outline';
import ResourceListItem from '@/Components/Lists/ResourceListItem.vue';

defineProps(['draft']);

const showPreview = ref(false);
</script>

<template>
    <Head :title="`Admin - Drafts - ${draft.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <Header3> Draft Details: {{ draft.name }} </Header3>
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
                        <div v-if="draft.cover_image_path" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Cover Image</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <SecondaryButtonSmall @click="showPreview = true" class="-my-2 sm:-my-2.5">Show image</SecondaryButtonSmall>
                                <Teleport to="body">
                                    <TransitionRoot as="template" :show="showPreview">
                                        <Dialog as="div" class="relative z-10" @close="showPreview = false">
                                            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                                            </TransitionChild>

                                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                                        <DialogPanel class="relative transform block w-full h-full overflow-hidden rounded-lg bg-gray-600 text-left shadow-xl transition-all sm:w-full sm:max-w-4xl">
                                                            <img :src="draft.cover_image_url" class="object-cover pointer-events-none">
                                                        </DialogPanel>
                                                    </TransitionChild>
                                                </div>
                                            </div>
                                        </Dialog>
                                    </TransitionRoot>
                                </Teleport>
                            </dd>
                        </div>
                        <div v-if="draft.summary" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Summary</dt>
                            <dd class="mt-1 prose max-w-3xl prose-a:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-html="draft.summary" />
                        </div>
                        <div v-if="draft.show_me_video_url" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">"Show Me" Video</dt>
                            <dd class="mt-1 text-sm text-gray-900 hover:text-gray-700 sm:mt-0 sm:col-span-2">
                                <a :href="draft.show_me_video_url" target="_blank" rel="nofollow noopener noreferrer" class="flex items-center group">
                                    <span class="group-hover:underline"> {{ draft.show_me_video_url }} </span>
                                    <ArrowTopRightOnSquareIcon class="ml-3 flex-shrink-0 h-4 w-4" />
                                </a>
                            </dd>
                        </div>
                        <div v-if="draft.content" class="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Content</dt>
                            <dd class="mt-1 text-sm text-gray-900 prose max-w-none space-y-6 sm:mt-0 sm:col-span-7">
                                <template v-for="item in draft.content" :key="item.id">
                                    <div v-if="item.type === 'summary'">
                                        <div class="text-stone-500 font-medium hover:underline">Summary</div>
                                        <div v-html="item.data" />
                                    </div>
                                    <div v-else-if="item.type === 'resources'">
                                        <div class="text-xl font-medium">Resources</div>
                                        <ol>
                                            <ResourceListItem v-for="(resource, index) in item.data" :key="index" :resource="resource" />
                                        </ol>
                                    </div>
                                    <div v-else-if="item.type === 'exercises'">
                                        <div class="text-stone-500 font-medium hover:underline">Exercises</div>
                                        <div v-html="item.data" />
                                    </div>
                                    <div v-else-if="item.type === 'header'">
                                        <Header5> {{ item.data }} </Header5>
                                    </div>
                                    <div v-else v-html="item.data" />
                                </template>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>