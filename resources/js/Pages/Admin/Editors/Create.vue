<script setup>
import { ref } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/24/solid';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    admins: Array,
    roles: Array,
});

const user = useForm({
    admin_id: null,
    email: "",
    name: "",
    role: "editor",
});

const setSelectedAdmin = () => {
    return props.admins.find(admin => admin.id === usePage().props.auth.user.id)
        || { name: "Select admin" };
}

const selectedAdmin = ref(setSelectedAdmin());

const submit = () => {
    user.admin_id = selectedAdmin.value.id;
    user.post(route('admin.editors.invite'));
}
</script>

<template>
    <Head title="Admin - Invite Editor" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3> Invite Admin or Editor </Header3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="divide-y divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="User name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="user.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="user.errors?.name" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="User email" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="email" v-model="user.email" id="email" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="user.errors?.email" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel value="Admin" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <Listbox as="div" v-model="selectedAdmin">
                                <div class="relative">
                                    <ListboxButton class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <span class="block truncate">{{ selectedAdmin.name.charAt(0).toUpperCase() + selectedAdmin.name.slice(1) }}</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </span>
                                    </ListboxButton>

                                    <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                        <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                            <ListboxOption as="template" v-for="(admin, index) in admins" :key="index" :value="admin" v-slot="{ active, selectedAdmin }">
                                                <li :class="[active ? 'text-white bg-blue-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                    <div class="flex">
                                                        <span :class="[selectedAdmin ? 'font-semibold' : 'font-normal', 'truncate']">{{ admin.name }}</span>
                                                        <span :class="[active ? 'text-blue-200' : 'text-gray-500', 'ml-2 truncate']">{{ admin.roles[0].name }}</span>
                                                    </div>

                                                    <span v-if="selectedAdmin" :class="[active ? 'text-white' : 'text-blue-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
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
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.editors.index')" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>