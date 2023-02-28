<script setup>
import { BoltIcon } from '@heroicons/vue/24/solid';
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
            <Header color="yellow" @remove="$emit('delete')">
                <BoltIcon class="mr-1 h-3 w-3" />
                QUIKLinks
            </Header>
        </div>
        <div class="w-full border-2 border-yellow-200 rounded-b rounded-tr">
            <TextEditor v-model="item.data" @update:model-value="update($event)" active-color="text-yellow-700 bg-yellow-200 hover:bg-yellow-300 focus:ring-yellow-300" />
        </div>
    </div>
</template>