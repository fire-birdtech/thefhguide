<script setup>
import { ArrowTopRightOnSquareIcon, DocumentTextIcon } from '@heroicons/vue/24/outline';

defineProps(['resource']);
</script>

<template>
    <li>
        <a :href="resource.url" target="_blank" class="flex items-center justify-between group py-3 pl-3 pr-4 text-sm w-full">
            <div class="flex w-0 flex-1 items-center">
                <DocumentTextIcon class="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden="true" />
                <span class="ml-2 w-0 flex-1 truncate group-hover:underline">{{ resource.name }}</span>
            </div>
            <div class="ml-4 flex-shrink-0">
                <ArrowTopRightOnSquareIcon class="h-5 w-5" />
            </div>
        </a>
    </li>
</template>