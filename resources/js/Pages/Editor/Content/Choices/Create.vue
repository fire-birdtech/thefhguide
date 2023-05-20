<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import Header3 from '@/Components/Headers/Header3.vue';
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
    goal: Object,
});

const choice = useForm({
    name: '',
    goal_id: props.goal.id,
    images: [],
    content: [],
});

const hasSummary = ref(false);
const hasExercises = ref(false);

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
    choice.post(route('editor.choices.store'));
}
</script>

<template>
    <Head title="Admin - Create Choice" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3> Create Choice </Header3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="divide-y divide-gray-200">
                    <div class="divide-y divide-gray-200">
                        <div>
                            <div class="divide-y divide-gray-200">
                                <div class="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-center sm:pt-4">
                                    <BreezeLabel for="name" value="Name" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                                        <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                                    </div>
                                </div>
                                <div class="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
                                    <BreezeLabel for="name" value="Content" class="sm:mt-px sm:pt-1" />
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
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('editor.goals.show', [goal.id])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>