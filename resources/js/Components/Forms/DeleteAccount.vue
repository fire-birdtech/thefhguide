<script setup>
import { inject } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import DangerButton from '@/Components/Buttons/DangerButton.vue';

defineProps(['hasRoles']);

const user = inject('user');

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
                        @click="submit"
                        :disabled="hasRoles"
                    >Delete account</DangerButton>
                </div>
            </div>
        </div>
    </div>
</template>