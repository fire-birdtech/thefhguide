<script setup>
import { XMarkIcon } from '@heroicons/vue/24/solid';

defineProps(['color']);
defineEmits(['remove']);

const textStyles = {
    emerald: 'text-emerald-700',
    orange: 'text-orange-700',
    purple: 'text-purple-700',
    red: 'text-red-700',
    sky: 'text-sky-700',
    yellow: 'text-yellow-700'
}
const bgStyles = {
    emerald: 'bg-emerald-200',
    orange: 'bg-orange-200',
    purple: 'bg-purple-200',
    red: 'bg-red-200',
    sky: 'bg-sky-200',
    yellow: 'bg-yellow-200'
}
const closeIconStyles = {
    sky: 'hover:bg-sky-300 focus:bg-sky-400 focus:outline-none'
}
</script>

<template>
    <span :class="[textStyles[color], bgStyles[color], 'group inline-flex items-center rounded-t px-2 py-0.5 text-xs font-medium']">
        <slot />
        <button type="button" @click.prevent="$emit('remove')" :class="[textStyles[color], closeIconStyles[color], 'hidden ml-1.5 -mr-0.5 h-3.5 w-3.5 flex-shrink-0 items-center justify-center rounded group-hover:inline-flex']">
            <span class="sr-only">Remove content block</span>
            <XMarkIcon class="h-3 w-3" />
        </button>
    </span>
</template>