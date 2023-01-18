<script setup>
import { Link } from '@inertiajs/vue3';
import { LockClosedIcon } from '@heroicons/vue/24/solid';

defineProps({
    as: String,
    href: String,
    locked: Boolean,
    type: {
        type: String,
        default: 'submit',
    }
});

const classes = "relative inline-flex bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto";
</script>

<template>
    <Link :href="href" :class="[classes, locked && 'pointer-events-none cursor-default']" v-if="as === 'link'">
        <div v-if="locked" class="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-200 opacity-70 z-40">
            <LockClosedIcon class="h-4 w-4 opacity-80" aria-hidden="true" />
        </div>
        <div class="relative">
            <slot />
        </div>
    </Link>
    <button :type="type" :class="[classes, locked && 'pointer-events-none cursor-default']" v-else>
        <div v-if="locked" class="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-200 opacity-70 z-40">
            <LockClosedIcon class="h-4 w-4 opacity-80" aria-hidden="true" />
        </div>
        <div class="relative">
            <slot />
        </div>
    </button>
</template>