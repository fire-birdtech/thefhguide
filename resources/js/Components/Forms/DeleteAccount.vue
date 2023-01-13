<script setup>
import { inject } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import DangerButton from '@/Components/Buttons/DangerButton.vue';

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
            <div class="max-w-md space-y-6 sm:space-y-5">
                <div class="sm:pt-2">
                    <DangerButton @click="submit">Delete account</DangerButton>
                </div>
            </div>
        </div>
    </div>
</template>