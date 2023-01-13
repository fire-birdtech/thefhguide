<script setup>
import { inject, ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { Inertia } from '@inertiajs/inertia';
import DangerButton from '@/Components/Buttons/DangerButton.vue';
import DangerModal from '@/Components/Modals/DangerModal.vue';

defineProps(['hasRoles']);

const user = inject('user');

const open = ref(false);
const close = () => {
    open.value = false;
}

const submit = () => {
    Inertia.delete(route('settings.delete-account', [user.id]));
}
</script>

<template>
    <div class="space-y-6 sm:space-y-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-red-500">Delete Account</h3>
        </div>
        <div class="pt-4 border-t border-gray-200">
            <div class="space-y-6 sm:space-y-5">
                <div v-if="hasRoles" class="space-y-2">
                    <p class="text-sm">Your account currently has a role in the CMS.</p>
                    <p class="text-sm">You must have the role removed before you can delete your account.</p>
                </div>
                <div class="sm:pt-2">
                    <DangerButton
                        @click="open = true"
                        :disabled="hasRoles"
                    >Delete account</DangerButton>
                </div>
            </div>
        </div>
    </div>

    <Teleport to="body">
        <DangerModal :open="open" action-text="Delete" emit-name="delete" @close="close" @delete="submit">
            <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Delete account </DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete your account? All data will be permanently removed forever. This action cannot be undone.</p>
            </div>
        </DangerModal>
    </Teleport>
</template>