<script setup>
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';
import TextEditor from '@/Components/TextEditor.vue';

const props = defineProps(['modelValue']);

const emit = defineEmits(['delete', 'update:modelValue']);

const update = () => {
    emit('update:modelValue', props.modelValue);
}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <Header color="yellow" @remove="$emit('delete')">Text Block</Header>
        </div>
        <div class="w-full border-2 border-yellow-200 rounded-b rounded-tr">
            <TextEditor v-model="modelValue" @update:model-value="update" active-color="text-yellow-700 bg-yellow-200 hover:bg-yellow-300 focus:ring-yellow-300" />
        </div>
    </div>
</template>