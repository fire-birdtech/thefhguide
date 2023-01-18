<script setup>
import { provide } from '@vue/runtime-core';
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import SettingsLayout from '@/Layouts/Settings.vue';
import { Head } from '@inertiajs/vue3';
import DeleteAccount from '@/Components/Forms/DeleteAccount.vue';

const props = defineProps(['hasRoles', 'user']);

provide('user', props.user);
</script>

<template>
    <Head title="Account" />

    <AuthenticatedLayout>
        <SettingsLayout>
            <DeleteAccount :has-roles="hasRoles" />
        </SettingsLayout>
    </AuthenticatedLayout>
</template>