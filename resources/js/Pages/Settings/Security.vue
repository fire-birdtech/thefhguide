<script setup>
import { provide } from 'vue';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import SettingsLayout from '@/Layouts/Settings.vue';
import { Head } from '@inertiajs/vue3';
import UpdatePassword from '@/Components/Forms/UpdatePassword.vue';

const props = defineProps(['user']);

provide('user', props.user);
</script>

<template>
    <Head title="Security" />

    <AuthenticatedLayout>
        <SettingsLayout>
            <UpdatePassword />
        </SettingsLayout>
    </AuthenticatedLayout>
</template>