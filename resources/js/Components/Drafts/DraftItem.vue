<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { DocumentTextIcon } from '@heroicons/vue/24/outline';

defineProps({
    draft: Object
});
</script>

<template>
    <li class="col-span-1">
        <Link :href="route('editor.drafts.show', [draft.id])" class="flex flex-col bg-white hover:bg-blue-50 border-2 border-transparent hover:border-blue-400 text-center rounded-lg shadow">
            <div class="flex w-full items-start justify-between space-x-6 p-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="truncate text-sm font-medium text-gray-900">{{ draft.name }}</h3>
                    </div>
                    <p class="mt-1 truncate text-xs text-left text-gray-500">Last updated {{ new Date(draft.updated_at).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}</p>
                </div>
                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-md bg-blue-400 text-white">
                    <DocumentTextIcon class="h-5 w-5" />
                </div>
            </div>
        </Link>
    </li>
</template>