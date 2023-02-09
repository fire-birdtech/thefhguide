<script setup>
import { ref } from 'vue';
import AddResourceCreate from '@/Components/Forms/Choices/AddResourceCreate.vue';
import ResourceListWrapper from '@/Components/Lists/ResourceListWrapper.vue';
import ResourceListItem from '@/Components/Lists/ResourceListItem.vue';

defineProps(['choice','resources']);

const show = ref(true);

const addResource = (event) => {
    console.log(event);
}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <span class="inline-flex items-center rounded-t bg-purple-200 px-2 py-0.5 text-xs font-medium text-purple-700">Resources</span>
        </div>
        <div class="w-full p-4 border-2 border-purple-200 rounded-b rounded-tr">
            <div v-if="resources.length > 0" class="pb-4">
                <ResourceListWrapper>
                    <ResourceListItem v-for="resource in resources" :key="resource.id" :resource="resource" />
                </ResourceListWrapper>
            </div>
            <AddResourceCreate v-if="show" />
        </div>
    </div>
</template>