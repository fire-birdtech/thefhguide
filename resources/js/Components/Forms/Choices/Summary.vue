<script setup>
import TextEditor from '@/Components/TextEditor.vue';

defineProps(['summary']);
</script>

<template>
    <div class="flex flex-col">
        <div>
            <span class="inline-flex items-center rounded-t bg-sky-200 px-2 py-0.5 text-xs font-medium text-sky-700">Summary</span>
        </div>
        <div class="w-full border-2 border-sky-200 rounded-b rounded-tr">
            <TextEditor v-model="summary" active-color="text-sky-700 bg-sky-200 hover:bg-sky-300 focus:ring-sky-300" />
        </div>
    </div>
</template>