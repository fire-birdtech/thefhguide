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

const classes = "inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-40 sm:w-auto";
</script>

<template>
    <Link :href="href" :class="classes" v-if="as === 'link'">
        <slot />
    </Link>
    <button :type="type" :class="classes" v-else>
        <slot />
    </button>
</template>