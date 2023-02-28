<script setup>
import { onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import TextEditor from '@/Components/TextEditor.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import AddResource from '@/Components/Forms/AddResource.vue';
import ResourceListWrapper from './Lists/ResourceListWrapper.vue';
import ResourceListItem from './Lists/ResourceListItem.vue';
import Summary from '@/Components/Forms/Choices/Summary.vue';
import AddSummaryButton from '@/Components/Buttons/Choices/AddSummaryButton.vue';
import TextBlock from '@/Components/Forms/Choices/TextBlock.vue';
import AddTextBlockButton from '@/Components/Buttons/Choices/AddTextBlockButton.vue';
import Images from '@/Components/Forms/Choices/Images.vue';
import ResourceList from '@/Components/Forms/Choices/ResourceList.vue';
import AddResourceListButton from '@/Components/Buttons/Choices/AddResourceListButton.vue';
import Header from '@/Components/Forms/Choices/Header.vue';
import AddHeaderButton from '@/Components/Buttons/Choices/AddHeaderButton.vue';
import Exercises from '@/Components/Forms/Choices/Exercises.vue';
import AddExercisesButton from '@/Components/Buttons/Choices/AddExercisesButton.vue';
import QUIKLinks from '@/Components/Forms/Choices/QUIKLinks.vue';
import AddQuikLinksButton from '@/Components/Buttons/Choices/AddQuikLinksButton.vue';

const props = defineProps({
    currentChoice: Object
});

const emits = defineEmits(['close']);

const show = ref(false);

const choice = useForm({
    ...props.currentChoice
});

const hasSummary = ref(false);
const hasExercises = ref(false);

onMounted(() => {
    for (let item of choice.content) {
        if (item.type === 'summary') {
            hasSummary.value = true;
        } else if (item.type === 'exercises') {
            hasExercises.value = true;
        }
    }
});

const addProperty = (type) => {
    type === 'resources' ? choice.content.push({ 'type': type, 'data': [] }) : choice.content.push({ 'type': type, 'data': "" });

    if (type === 'summary') {
        hasSummary.value = true;
    }
    if (type === 'exercises') {
        hasExercises.value = true;
    }
}

const updateProperty = (index, data) => {
    choice.content[index].data = data;
}

const updateImages = (data) => {
    choice.images = data;
}

const deleteProperty = (index) => {
    if (choice.content[index].type === 'summary') {
        hasSummary.value = false;
    }
    if (choice.content[index].type === 'exercises') {
        hasExercises.value = false;
    }

    choice.content.splice(index, 1);
}

const submit = () => {
    choice.put(route('editor.choices.update', [choice.id]), {
        preserveScroll: true,
    });
}

const addResource = (event) => {
    choice.resourceList.push(event);
    show.value = false;
}
</script>

<template>
    <div class="border-t border-gray-200">
        <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
            <div class="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Name" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-7">
                    <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="content" value="Content" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
                    <template v-for="(item, index) in choice.content" :key="index">
                        <Summary v-if="item.type === 'summary'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                        <TextBlock v-else-if="item.type === 'text'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                        <ResourceList v-if="item.type === 'resources'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                        <Header v-else-if="item.type === 'header'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                        <Exercises v-else-if="item.type === 'exercises'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
                        <QUIKLinks v-else-if="item.type === 'quiklinks'" @delete="deleteProperty(index)" @update="updateProperty(index, $event)" :item="item" />
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
            <!-- <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-model="choice.summary" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.summary" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Instructions" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-model="choice.instructions" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.instructions" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Resources" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <div v-if="choice.resources.length" class="pb-4">
                        <ResourceListWrapper>
                            <ResourceListItem v-for="resource in choice.resources" :key="resource.id" :resource="resource" />
                        </ResourceListWrapper>
                    </div>
                    <AddResource v-if="show" @hide="addResource($event)" :choice-id="choice.id" />
                    <SecondaryButton @click.prevent="show = true" v-else>Add a resource</SecondaryButton>
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Review" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-if="choice.review" v-model="choice.review" />
                    <SecondaryButton @click.prevent="choice.review = !choice.review" v-else>Add review</SecondaryButton>
                    <BreezeInputError class="mt-1" :message="choice.errors?.review" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Exercises" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-if="choice.exercises" v-model="choice.exercises" />
                    <SecondaryButton @click.prevent="choice.exercises = !choice.exercises" v-else>Add exercises</SecondaryButton>
                    <BreezeInputError class="mt-1" :message="choice.errors?.exercises" />
                </div>
            </div> -->
            <div class="px-6 py-4">
                <div class="flex justify-end">
                    <SecondaryButton type="button" @click="$emit('close')">Cancel</SecondaryButton>
                    <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                </div>
            </div>
        </form>
    </div>
</template>