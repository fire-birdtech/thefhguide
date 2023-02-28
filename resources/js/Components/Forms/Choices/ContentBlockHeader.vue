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
    emerald: 'hover:bg-emerald-300 focus:bg-emerald-400',
    orange: 'hover:bg-orange-300 focus:bg-orange-400',
    purple: 'hover:bg-purple-300 focus:bg-purple-400',
    red: 'hover:bg-red-300 focus:bg-red-400',
    sky: 'hover:bg-sky-300 focus:bg-sky-400',
    yellow: 'hover:bg-yellow-300 focus:bg-yellow-400'
}
</script>

<template>
    <div class="block group">
        <span :class="[textStyles[color], bgStyles[color], 'inline-flex items-center rounded-t px-2 py-0.5 text-xs leading-6 font-medium']">
            <slot />
            <button type="button" @click.prevent="$emit('remove')" :class="[textStyles[color], closeIconStyles[color], 'hidden ml-1.5 -mr-0.5 h-3.5 w-3.5 flex-shrink-0 items-center justify-center rounded group-hover:inline-flex focus:outline-none']">
                <span class="sr-only">Remove content block</span>
                <XMarkIcon class="h-3 w-3" />
            </button>
        </span>
    </div>
</template>