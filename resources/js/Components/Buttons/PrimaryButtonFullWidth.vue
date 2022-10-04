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

const classes = "w-full flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 mb-1 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40";
</script>

<template>
    <Link :href="href" :class="classes" v-if="as === 'link'">
        <slot />
    </Link>
    <button :type="type" :class="classes" v-else>
        <slot />
    </button>
</template>