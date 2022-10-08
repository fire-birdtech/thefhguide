<script setup>
import { UserCircleIcon } from '@heroicons/vue/24/solid';
import Badge from '@/Components/Badge.vue';

defineProps({
    editor: Object
});
</script>

<template>
    <div>
        <div class="group w-full border-2 border-transparent flex flex-col items-center justify-start rounded-lg bg-white text-center shadow hover:border-blue-400 hover:bg-blue-50">
            <div class="flex w-full items-center justify-between space-x-3 p-4">
                <UserCircleIcon class="h-10 w-10 flex-shrink-0 rounded-full text-blue-400" />
                <div class="flex-1 truncate text-left">
                    <div class="flex items-center space-x-3">
                        <h3 class="truncate text-sm font-medium text-gray-900">{{ editor.name }}</h3>
                    </div>
                    <p class="truncate text-sm text-gray-500">{{ editor.roles[0].name }}</p>
                </div>
            </div>
            <div class="w-full">
                <div v-if="editor.unpublished_assignments.length || editor.unpublished_drafts.length" class="w-full space-y-3 pb-4">
                    <div class="px-4">
                        <div class="flex flex-col w-full overflow-hidden rounded-md bg-blue-50 group-hover:bg-blue-100">
                            <div v-if="editor.unpublished_assignments.length" class="w-full flex flex-col items-start py-3">
                                <h4 class="truncate text-sm font-medium text-gray-900 px-4">Assignments</h4>
                                <div class="w-full overflow-hidden bg-transparent">
                                    <ul role="list" class="mt-2 w-full space-y-2">
                                        <li v-for="assignment in editor.unpublished_assignments" :key="assignment.id" class="truncate w-full flex items-center justify-between text-xs px-4">
                                            {{ assignment.summary }}
                                            <Badge :text="assignment.status" class="ml-4" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4">
                        <div class="flex flex-col w-full overflow-hidden rounded-md bg-blue-50 group-hover:bg-blue-100">
                            <div v-if="editor.unpublished_drafts.length" class="w-full flex flex-col items-start py-3">
                                <h4 class="truncate text-sm font-medium text-gray-900 px-4">Drafts</h4>
                                <div class="w-full overflow-hidden bg-transparent">
                                    <ul role="list" class="mt-2 w-full space-y-2">
                                        <li v-for="draft in editor.unpublished_drafts" :key="draft.id" class="truncate w-full flex items-center justify-between text-xs px-4">
                                            {{ draft.new_name }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>