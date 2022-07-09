<script setup>
defineProps(['optional','value']);
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
        <span v-show="optional" class="mt-2 block text-xs font-medium uppercase text-gray-500">Optional</span>
    </label>
</template>
