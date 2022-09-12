<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Admin Content" />

    <AdminLayout type="$page.props.auth.user.roles[0].name"></AdminLayout>
</template>