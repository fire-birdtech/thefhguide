<script setup>
import TextEditor from '@/Components/TextEditor.vue';

defineProps(['exercises']);
</script>

<template>
    <div class="flex flex-col">
        <div>
            <span class="inline-flex items-center rounded-t bg-emerald-200 px-2 py-0.5 text-xs font-medium text-emerald-700">Exercises</span>
        </div>
        <div class="w-full border-2 border-emerald-200 rounded-b rounded-tr">
            <TextEditor v-model="exercises" active-color="text-emerald-700 bg-emerald-200 hover:bg-emerald-300 focus:ring-emerald-300" />
        </div>
    </div>
</template>