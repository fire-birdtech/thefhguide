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
            <Header color="sky" @remove="$emit('delete')">Summary</Header>
        </div>
        <div class="w-full border-2 border-sky-200 rounded-b rounded-tr">
            <TextEditor v-model="modelValue" @update:model-value="update" active-color="text-sky-700 bg-sky-200 hover:bg-sky-300 focus:ring-sky-300" />
        </div>
    </div>
</template>