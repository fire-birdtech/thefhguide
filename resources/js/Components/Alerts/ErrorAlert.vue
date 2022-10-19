<script setup>
import { XCircleIcon } from '@heroicons/vue/20/solid';

defineProps({
    message: String
});
</script>

<template>
    <div v-show="message" class="rounded-md bg-red-200 p-4 mb-12">
        <div class="flex">
            <div class="flex-shrink-0">
                <XCircleIcon class="h-5 w-5 text-red-400" aria-hidden="true" />
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Error</h3>
                <div class="mt-2 text-sm text-red-700">
                    <p>{{ message }}</p>
                </div>
            </div>
        </div>
    </div>
</template>