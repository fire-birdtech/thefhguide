<script setup>
defineProps({
    status: String,
});
</script>

<template>
    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ status.charAt(0).toUpperCase() + status.slice(1) }}</span>
</template>