<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    admins: Array,
    roles: Array,
    user: Object
});

const findAdmin = () => {
    return props.admins.find(admin => admin.id === props.user.admin_id) || { name: "No admin" };
}
const findRole = (roleName) => {
    return props.user.roles.find(role => role.name === roleName);
}

const updateUserRoles = (role) => {
    findRole(role.name) ?
        props.user.roles.splice(
            props.user.roles.findIndex(r => r.id === role.id), 1
        ) :
        props.user.roles.push(role);
}

const selectedAdmin = ref(findAdmin());

const submit = () => {
    props.user.admin_id = selectedAdmin.value.id;
    Inertia.put(route('admin.editors.update', [props.user.id]), props.user);
}
</script>

<template>
    <Head :title="`Admin - Edit ${user.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3> Edit User: {{ user.name }} </Header3>
            <div class="mt-4 bg-white shadow sm:rounded-lg">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
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
                        <BreezeLabel for="name" value="Roles" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-1">
                            <fieldset class="space-y-4">
                                <div v-for="role in roles" :key="role.id" class="relative flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="roles" aria-describedby="comments-description" @change="updateUserRoles(role)" :name="role.name" :checked="findRole(role.name)" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments" class="font-medium text-gray-700">{{ role.name }}</label>
                                    </div>
                                </div>
                            </fieldset>
                            <BreezeInputError class="mt-1" :message="user.errors?.roles" />
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
                    <div class="px-6 py-4 sm:border-t sm:border-gray-200">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.editors.show', [user.id])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>