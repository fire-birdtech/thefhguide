<script setup>
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';

const props = defineProps(['item']);

const emit = defineEmits(['delete', 'update']);

const update = () => {
    emit('update', props.item.data);
}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <Header color="orange" @remove="$emit('delete')">Header</Header>
        </div>
        <div class="w-full p-4 border-2 border-orange-200 rounded-b rounded-tr">
            <input type="text" v-model="item.data" @input="update" class="w-full rounded text-sm border border-orange-200 focus:border-orange-700 focus:ring-0" placeholder="Header text" autofocus>
        </div>
    </div>
</template>