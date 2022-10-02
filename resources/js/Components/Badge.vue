<script setup>
defineProps({
    text: String,
});
</script>

<template>
    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
        {{ text.charAt(0).toUpperCase() + text.slice(1) }}
    </span>
</template>