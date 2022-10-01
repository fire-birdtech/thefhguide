<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    as: String,
    href: String,
    type: {
        type: String,
        default: 'submit',
    }
});
const classes = "relative inline-flex bg-white px-2.5 py-1.5 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto";
</script>

<template>
    <Link :href="href" :class="classes" v-if="as === 'link'">
        <slot />
    </Link>
    <button :type="type" :class="classes" v-else>
        <slot />
    </button>
</template>