<script setup>
import TextEditor from '@/Components/TextEditor.vue';

defineProps(['text']);
</script>

<template>
    <div class="flex flex-col">
        <div>
            <span class="inline-flex items-center rounded-t bg-yellow-200 px-2 py-0.5 text-xs font-medium text-yellow-700">Text Block</span>
        </div>
        <div class="w-full border-2 border-yellow-200 rounded-b rounded-tr">
            <TextEditor v-model="text" active-color="text-yellow-700 bg-yellow-200 hover:bg-yellow-300 focus:ring-yellow-300" />
        </div>
    </div>
</template>