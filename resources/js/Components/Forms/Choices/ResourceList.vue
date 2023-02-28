<script setup>
import { ref } from 'vue';
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';
import AddResourceCreate from '@/Components/Forms/Choices/AddResourceCreate.vue';
import ResourceListWrapper from '@/Components/Lists/ResourceListWrapper.vue';
import ResourceListItem from '@/Components/Lists/ResourceListItem.vue';

const props = defineProps(['item'])

const emit = defineEmits(['delete','update']);

const show = ref(true);

const resources = ref([ ...props.item.data ]);

const update = () => {
    emit('update', resources);
}

const addResource = (event) => {
    resources.value.push(event);

    update();
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
                    <ResourceListItem v-for="resource in resources" :key="resource.id" :resource="resource" />
                </ResourceListWrapper>
            </div>
            <AddResourceCreate v-if="show" @add="addResource($event)" />
        </div>
    </div>
</template>