<script setup>
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';
import TextEditor from '@/Components/TextEditor.vue';

const props = defineProps(['item']);

const emit = defineEmits(['delete', 'update']);

const update = (updatedData) => {
    emit('update', updatedData);
}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <Header color="red" @remove="$emit('delete')">Text Block</Header>
        </div>
        <div class="w-full border-2 border-red-200 rounded-b rounded-tr">
            <TextEditor v-model="item.data" @update:model-value="update($event)" active-color="text-red-700 bg-red-200 hover:bg-red-300 focus:ring-red-300" />
        </div>
    </div>
</template>