<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import PrimaryButton from '@/Components/PrimaryButton';
import { EyeIcon, PencilAltIcon, TrashIcon } from '@heroicons/vue/outline';
import SecondaryButton from '@/Components/SecondaryButton';
import { Inertia } from '@inertiajs/inertia';
import DeleteModal from '@/Components/DeleteModal';
import { DialogTitle } from '@headlessui/vue';

const props = defineProps({
    users: Array,
    invitations: Array,
});

const selectedInvitation = ref(null);
const open = ref(false);
const close = () => {
    open.value = false;
}

const findInvitationById = (id) => {
    return props.invitations.find(invitation => invitation.id === id);
}

const selectInvitationForDelete = (id) => {
    selectedInvitation.value = findInvitationById(id);
    open.value = true;
}

const remainingTime = (time) => {
    return Date.now() - new Date(time).getTime();
};
const isExpired = (time) => {
    return remainingTime(time) > 86400000;
};

const resendInvitation = (invitation) => {
    Inertia.post(route('admin.invitations.resend', [invitation]));
}
const deleteInvitation = () => {
    Inertia.delete(route('admin.invitations.destroy', [selectedInvitation.value.id]), {
        onSuccess: () => open.value = false,
    });
}
</script>

<template>
    <Head title="Admin - Editors" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Admins & Editors</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the admins and editors including their name, email, and type.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <PrimaryButton :href="route('admin.editors.create')" as="link">Invite</PrimaryButton>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Manage</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr v-for="(user, userIdx) in users" :key="user.id" :class="userIdx % 2 === 0 ? undefined : 'bg-gray-50'">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                                            <Link :href="route('admin.editors.show', [user.id])">{{ user.name }}</Link>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ user.email }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800"> {{ user.roles[0].name }} </span>
                                        </td>
                                        <td class="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                                            <Link :href="route('admin.editors.show', [user.id])" class="text-indigo-600 hover:text-indigo-900">
                                                <EyeIcon class="h-6 w-6" />
                                                <span class="sr-only">View {{ user.name }}</span>
                                            </Link>
                                            <Link :href="route('admin.editors.edit', [user.id])" class="text-indigo-600 hover:text-indigo-900">
                                                <PencilAltIcon class="h-6 w-6" />
                                                <span class="sr-only">Edit {{ user.name }}</span>
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="invitations.length" class="mt-12">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Invitations</h1>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="flow-root bg-white shadow overflow-hidden sm:rounded-md">
                        <ul role="list" class="divide-y divide-gray-200">
                            <li v-for="invitation in invitations" :key="invitation.id" class="py-4">
                                <div class="flex items-center space-x-4 px-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ invitation.name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ invitation.email }}
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <SecondaryButton v-if="isExpired(invitation.updated_at)" @click="resendInvitation(invitation)"> Resend </SecondaryButton>
                                        <SecondaryButton @click="selectInvitationForDelete(invitation.id)">
                                            <TrashIcon class="h-5 w-5" />
                                            <span class="sr-only">Delete invitation for {{ invitation.name }}</span>
                                        </SecondaryButton>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <DeleteModal :open="open" @close="close" @delete="deleteInvitation">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete invitation </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete this invitation for {{ selectedInvitation.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DeleteModal>
    </AdminLayout>
</template>