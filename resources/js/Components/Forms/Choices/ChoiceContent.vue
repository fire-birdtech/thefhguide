<script setup>
import { ref } from 'vue';
import BreezeLabel from '@/Components/Label.vue';
import Summary from '@/Components/Forms/Choices/Summary.vue';
import AddSummaryButton from '@/Components/Buttons/Choices/AddSummaryButton.vue';
import TextBlock from '@/Components/Forms/Choices/TextBlock.vue';
import AddTextBlockButton from '@/Components/Buttons/Choices/AddTextBlockButton.vue';
import ResourceList from '@/Components/Forms/Choices/ResourceList.vue';
import AddResourceListButton from '@/Components/Buttons/Choices/AddResourceListButton.vue';
import Header from '@/Components/Forms/Choices/Header.vue';
import AddHeaderButton from '@/Components/Buttons/Choices/AddHeaderButton.vue';
import Exercises from '@/Components/Forms/Choices/Exercises.vue';
import AddExercisesButton from '@/Components/Buttons/Choices/AddExercisesButton.vue';
import QUIKLinks from '@/Components/Forms/Choices/QUIKLinks.vue';
import AddQuikLinksButton from '@/Components/Buttons/Choices/AddQuikLinksButton.vue';

const props = defineProps(['content']);

const emit = defineEmits(['update']);

const content = ref(
    props?.content || []
);

const hasSummary = ref(false);
const hasExercises = ref(false);

const addProperty = (type) => {
    type === 'resources' ? content.value.push({ 'type': type, 'data': [] }) : content.value.push({ 'type': type, 'data': "" });

    if (type === 'summary') {
        hasSummary.value = true;
    }
    if (type === 'exercises') {
        hasExercises.value = true;
    }

    emit('update', content.value);
}

const updateProperty = (index, data) => {
    content.value[index].data = data;

    emit('update', content.value);
}

const deleteProperty = (index) => {
    if (content.value[index].type === 'summary') {
        hasSummary.value = false;
    }
    if (content.value[index].type === 'exercises') {
        hasExercises.value = false;
    }

    content.value.splice(index, 1);

    emit('update', content.value);
}
</script>

<template>
    <div class="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
        <BreezeLabel for="name" value="Content" class="sm:mt-px sm:pt-1" />
        <div class="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
            <template v-for="(item, index) in content" :key="index">
                <Summary v-if="item?.type === 'summary'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                <TextBlock v-else-if="item?.type === 'text'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                <ResourceList v-if="item?.type === 'resources'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                <Header v-else-if="item?.type === 'header'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                <Exercises v-else-if="item?.type === 'exercises'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                <QUIKLinks v-else-if="item?.type === 'quiklinks'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
            </template>
            <div class="space-x-2">
                <AddSummaryButton v-if="! hasSummary" @click.prevent="addProperty('summary')" />
                <AddTextBlockButton @click.prevent="addProperty('text')" />
                <AddResourceListButton @click.prevent="addProperty('resources')" />
                <AddHeaderButton @click.prevent="addProperty('header')" />
                <AddExercisesButton v-if="! hasExercises" @click.prevent="addProperty('exercises')" />
                <AddQuikLinksButton @click.prevent="addProperty('quiklinks')" />
            </div>
        </div>
    </div>
</template>