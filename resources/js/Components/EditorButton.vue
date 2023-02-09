<script setup>
import { inject } from 'vue';

defineProps({
    active: Boolean,
    notActive: Boolean
});

const activeColor = inject('activeColor');
</script>

<template>
    <button type="button" :disabled="notActive" :class="[
        active ?
            [ activeColor ? activeColor : 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500', 'border border-transparent focus:ring focus:ring-opacity-40' ] :
            'border border-gray-300 text-gray-700 hover:bg-gray-50 bg-white focus:ring focus:ring-gray-300 focus:ring-opacity-40',
        'inline-flex items-center p-1 rounded-md shadow-sm text-xs uppercase font-medium focus:outline-none']">
        <slot />
    </button>
</template>