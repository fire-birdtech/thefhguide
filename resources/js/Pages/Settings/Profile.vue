<script setup>
import { provide } from '@vue/runtime-core';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import SettingsLayout from '@/Layouts/Settings.vue';
import { Head } from '@inertiajs/vue3';
import UpdateProfile from '@/Components/Forms/UpdateProfile.vue';

const props = defineProps(['user']);

provide('user', props.user);
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <SettingsLayout>
            <UpdateProfile />
        </SettingsLayout>
    </AuthenticatedLayout>
</template>