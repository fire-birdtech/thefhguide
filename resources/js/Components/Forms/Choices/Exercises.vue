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
            <Header color="emerald" @remove="$emit('delete')">Exercises</Header>
        </div>
        <div class="w-full border-2 border-emerald-200 rounded-b rounded-tr">
            <TextEditor v-model="modelValue" @update:model-value="update" active-color="text-emerald-700 bg-emerald-200 hover:bg-emerald-300 focus:ring-emerald-300" />
        </div>
    </div>
</template>