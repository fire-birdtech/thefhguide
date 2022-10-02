<script setup>
import { computed, ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import BreezeInput from '@/Components/Input';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';
import TextEditor from '@/Components/TextEditor';
import FormText from '@/Components/FormText.vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/24/solid';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';

const props = defineProps({
    editors: Array,
    assignable: Object,
    assignableType: String
});

const selected = ref({ name: "Select editor" });

const assignment = useForm({
    summary: '',
    details: '',
    user: null,
    assignable_id: props.assignable.id,
    assignable_type: props.assignableType
});

const submit = () => {
    assignment.user = selected.value.id;
    assignment.post(route('admin.assignments.store'));
}

const cancelLink = computed(() => {
    if (props.assignableType === 'choice') {
        return route('editor.' + props.assignableType + 's.show', [props.assignable.id]);
    } else {
        return route('editor.' + props.assignableType + 's.show', [props.assignable.slug])
    }
});
</script>

<template>
    <Head title="Create Assignment" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Create Assignment </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="space-y-4 divide-y divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                        <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="assignment.summary" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="assignment.errors.summary" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                        <BreezeLabel for="name" value="Details" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-model="assignment.details" />
                            <BreezeInputError class="mt-1" :message="assignment.errors?.details" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                        <BreezeLabel for="name" value="Editor" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <Listbox as="div" v-model="selected">
                                <div class="relative">
                                    <ListboxButton class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <span class="block truncate">{{ selected.name.charAt(0).toUpperCase() + selected.name.slice(1) }}</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </span>
                                    </ListboxButton>

                                    <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                        <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                            <ListboxOption as="template" v-for="(editor, index) in editors" :key="index" :value="editor" v-slot="{ active, selected }">
                                                <li :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                    <div class="flex">
                                                        <span :class="[selected ? 'font-semibold' : 'font-normal', 'truncate']">{{ editor.name }}</span>
                                                        <span :class="[active ? 'text-indigo-200' : 'text-gray-500', 'ml-2 truncate']">{{ editor.roles[0].name }}</span>
                                                    </div>

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
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4 sm:pb-2">
                        <BreezeLabel for="assignable" value="Belongs to" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <FormText v-model="assignable.name" id="assignable" class="block w-full" />
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="cancelLink" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>