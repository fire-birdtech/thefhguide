<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    type: {
        type: String,
        default: 'submit',
    }
});

const classes = "inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:ring focus:ring-red-500 focus:ring-opacity-40 sm:w-auto";
</script>

<template>
    <button :type="type" :class="classes">
        <slot />
    </button>
</template>