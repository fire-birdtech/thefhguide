<script setup>
import { inject, ref } from 'vue';
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';
import AddResourceCreate from '@/Components/Forms/Choices/AddResourceCreate.vue';
import ResourceListWrapper from '@/Components/Lists/ResourceListWrapper.vue';
import ResourceListItem from '@/Components/Lists/ResourceListItem.vue';

const props = defineProps(['index'])

const emit = defineEmits(['delete','remove','update']);

const show = ref(true);

const resources = ref([ inject('choice') ]);

const update = (event) => {
    emit('update', event);
}

const addResource = (event) => {
    resources.value.push(event);

    update(event);
}

const removeResource = (index) => {
    resources.value.splice(index, 1);
    emit('remove', index);
}

</script>

<template>
    <div class="flex flex-col">
        <div>
            <Header color="purple" @remove="$emit('delete')">Resource List</Header>
        </div>
        <div class="w-full p-4 border-2 border-purple-200 rounded-b rounded-tr">
            <div v-if="resources.length > 0" class="pb-4">
                <ResourceListWrapper>
                    <ResourceListItem v-for="(resource, index) in resources" :key="index" :resource="resource" @remove="removeResource(index)" />
                </ResourceListWrapper>
            </div>
            <AddResourceCreate v-if="show" @add="addResource($event)" />
        </div>
    </div>
</template>