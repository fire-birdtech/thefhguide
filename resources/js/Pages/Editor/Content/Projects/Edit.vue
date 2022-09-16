<script setup>
import { ref, watch } from 'vue';
import AdminLayout from '@/Layouts/Admin';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    collections: Array,
    project: Object,
});

const selected = ref(props.collections[
    props.collections.findIndex(
        collection => collection.id === props.project.collection.id
    )
]);

const submit = () => {
    Inertia.put(route('editor.projects.update', [props.project.slug]), props.project);
}

watch(selected, (newSelected, oldSelected) => {
    Object.assign(props.project.collection, newSelected);
});
</script>

<template>
    <Head :title="`Admin - Projects - Edit ${project.name}`" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Edit Project: {{ project.name }} </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Project name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="project.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="project.errors?.name" />
                        </div>
                    </div>
                    <div class="px-6 sm:border-t sm:border-gray-200 sm:pt-4">
                        <Listbox as="div" class="sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start" v-model="selected">
                            <ListboxLabel class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Belongs to </ListboxLabel>
                            <div class="mt-1 relative sm:col-span-4 sm:mt-0">
                                <ListboxButton class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <span class="block truncate">{{ selected.name }}</span>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                        <ListboxOption as="template" v-for="collection in collections" :key="collection.id" :value="collection" v-slot="{ active, selected }">
                                            <li :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-3 pr-9']">
                                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">
                                                    {{ collection.name }}
                                                </span>

                                                <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                            </div>
                        </Listbox>
                    </div>
                    <div class="px-6 py-4 mt-4 sm:border-t sm:border-gray-200">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('editor.projects.show', [project.slug])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>