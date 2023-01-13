<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    disabled: {
        type: Boolean,
        default: false
    }
});

const classes = [
    props.disabled ? 'cursor-not-allowed bg-red-400' : 'bg-red-600 hover:bg-red-700',
    'inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm focus:ring focus:ring-red-500 focus:ring-opacity-40 sm:w-auto'
];
</script>

<template>
    <button :type="type" :class="classes" :disabled="disabled">
        <slot />
    </button>
</template>