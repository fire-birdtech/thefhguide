<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { EyeIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import DangerModal from '@/Components/Modals/DangerModal.vue';
import TableHeader from '@/Components/Tables/TableHeader.vue';
import Table from '@/Components/Tables/Table.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import TableBody from '@/Components/Tables/TableBody.vue';

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

const cells = {
    name: 'Name',
    email: 'Email',
    role: 'Role'
}
</script>

<template>
    <Head title="Admin - Editors" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <TableHeader header="Admins & Editors" addText="Invite" :addLink="route('admin.editors.create')" />
            <Table class="mt-2">
                <TableHead :cells="cells" :actions="true" />
                <TableBody :cells="cells" :rows="users" routeType="admin.editors" :actions="true" />
            </Table>

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

        <Teleport to="body">
            <DangerModal :open="open" action-text="Delete" emit-name="delete" @close="close" @delete="deleteInvitation">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete invitation </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to delete this invitation for {{ selectedInvitation.name }}? All data will be permanently removed forever. This action cannot be undone.</p>
                </div>
            </DangerModal>
        </Teleport>
    </AdminLayout>
</template>