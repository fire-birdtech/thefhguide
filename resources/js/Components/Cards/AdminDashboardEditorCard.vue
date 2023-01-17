<script setup>
import { UserCircleIcon } from '@heroicons/vue/24/solid';
import Badge from '@/Components/Badge.vue';

defineProps({
    editor: Object
});
</script>

<template>
    <div>
        <div class="group w-full border-2 border-transparent flex flex-col items-center justify-start rounded-lg bg-white text-center shadow">
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
                <div v-if="editor.unpublished_assignments.length || editor.unpublished_drafts.length" class="w-full pb-3 space-y-3">
                    <div class="flex flex-col w-full overflow-hidden">
                        <div v-if="editor.unpublished_assignments.length" class="w-full flex flex-col items-start">
                            <h4 class="truncate text-sm font-medium text-gray-900 px-4">Assignments</h4>
                            <div class="w-full bg-transparent pt-2 px-4">
                                <ul role="list" class="flex flex-col w-full">
                                    <li v-for="assignment in editor.unpublished_assignments" :key="assignment.id" class="truncate w-full flex items-center justify-between text-xs py-1">
                                        <span class="truncate">{{ assignment.assignable.name }}</span>
                                        <Badge :text="assignment.status" class="ml-4" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-full overflow-hidden">
                        <div v-if="editor.unpublished_drafts.length" class="w-full flex flex-col items-start">
                            <h4 class="truncate text-sm font-medium text-gray-900 px-4">Drafts</h4>
                            <div class="w-full bg-transparent pt-2 px-4">
                                <ul role="list" class="flex flex-col w-full">
                                    <li v-for="draft in editor.unpublished_drafts" :key="draft.id" class="truncate w-full flex items-center justify-between text-xs py-1">
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
</template>