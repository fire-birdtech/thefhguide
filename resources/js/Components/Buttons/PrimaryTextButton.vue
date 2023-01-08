<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    }
});
</script>

<template>
    <button :type="type" class="font-medium text-blue-600 hover:text-blue-500">
        <slot />
    </button>
</template>