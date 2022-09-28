<script setup>
import TextEditor from '@/Components/TextEditor';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';

defineProps(['label', 'message', 'modelValue']);

defineEmits(['update:modelValue']);
</script>

<template>
    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
        <BreezeLabel for="name" :value="label" class="sm:mt-px sm:pt-2" />
        <div class="mt-1 sm:mt-0 sm:col-span-4">
            <TextEditor v-model="modelValue" @update:modelValue="$emit('update:modelValue', modelValue)" />
            <BreezeInputError class="mt-1" :message="message" />
        </div>
    </div>
</template>