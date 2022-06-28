<script setup>
defineProps({
    active: Boolean,
    notActive: Boolean,
});
</script>

<template>
    <button type="button" :disabled="notActive" :class="[
        active ?
            'border border-transparent text-white bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-40' :
            'border border-gray-300 text-gray-700 hover:bg-gray-50 bg-white focus:ring focus:ring-gray-300 focus:ring-opacity-40',
        'inline-flex items-center p-1 rounded-md shadow-sm text-xs uppercase font-medium focus:outline-none']">
        <slot />
    </button>
</template>