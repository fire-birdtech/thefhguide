<script setup>
import { UserCircleIcon } from '@heroicons/vue/24/solid';

defineProps({
    editor: Object
});
</script>

<template>
    <div class="w-full col-span-1 border-2 border-transparent flex flex-col items-center justify-center rounded-lg bg-white text-center shadow hover:border-blue-400 hover:bg-blue-50">
        <div class="flex w-full items-center justify-between space-x-3 p-4">
            <UserCircleIcon class="h-10 w-10 flex-shrink-0 rounded-full text-blue-400" />
            <div class="flex-1 truncate text-left">
                <div class="flex items-center space-x-3">
                    <h3 class="truncate text-sm font-medium text-gray-900">{{ editor.name }}</h3>
                </div>
                <p class="truncate text-sm text-gray-500">{{ editor.roles[0].name }}</p>
            </div>
        </div>
    </div>
</template>