<script setup>
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
import AddImagesButton from '@/Components/Buttons/Choices/AddImagesButton.vue';
import ResourceList from '@/Components/Forms/Choices/ResourceList.vue';
import AddResourceListButton from '@/Components/Buttons/Choices/AddResourceListButton.vue';
import Header from '@/Components/Forms/Choices/Header.vue';
import AddHeaderButton from '@/Components/Buttons/Choices/AddHeaderButton.vue';
import Exercises from '@/Components/Forms/Choices/Exercises.vue';
import AddExercisesButton from '@/Components/Buttons/Choices/AddExercisesButton.vue';

const props = defineProps({
    goal: String,
});

const choice = useForm({
    name: '',
    goal_id: props.goal,
    content: {},
});

const addProperty = (key) => {
    if (key === 'text' || key === 'header' || key === 'resources') {
        key += Object.keys(choice.content).filter(k => k.includes(key)).length + 1;
    }
    key === 'images' || key.includes('resources') ? choice.content[key] = [] : choice.content[key] = "";
}

const updateProperty = (key, data) => {
    choice.content[key] = data;
}

const deleteProperty = (key) => {
    delete choice.content[key];
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
                <form @submit.prevent="submit" class="space-y-6 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-5">
                                    <BreezeLabel for="name" value="Choice name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-7">
                                        <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-5">
                                    <BreezeLabel for="name" value="Content" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
                                        <template v-for="(item, key) in choice.content" :key="key">
                                            <Summary v-if="key === 'summary'" @delete="deleteProperty(key)" @update:model-value="updateProperty(key, $event)" />
                                            <TextBlock v-else-if="key.includes('text')" @delete="deleteProperty(key)" @update:model-value="updateProperty(key, $event)" />
                                            <Images v-if="key === 'images'" @delete="deleteProperty(key)" @update="updateProperty(key, $event)" />
                                            <ResourceList v-if="key.includes('resources')" @delete="deleteProperty(key)" @update="updateProperty(key, $event)" />
                                            <Header v-else-if="key.includes('header')" @delete="deleteProperty(key)" @update:model-value="updateProperty(key, $event)" />
                                            <Exercises v-else-if="key === 'exercises'" @delete="deleteProperty(key)" @update:model-value="updateProperty(key, $event)" />
                                        </template>
                                        <div class="space-x-2">
                                            <AddSummaryButton v-if="! ('summary' in choice.content)" @click.prevent="addProperty('summary')" />
                                            <AddTextBlockButton @click.prevent="addProperty('text')" />
                                            <AddImagesButton v-if="! ('images' in choice.content)" @click.prevent="addProperty('images')" />
                                            <AddResourceListButton @click.prevent="addProperty('resources')" />
                                            <AddHeaderButton @click.prevent="addProperty('header')" />
                                            <AddExercisesButton v-if="! ('exercises' in choice.content)" @click.prevent="addProperty('exercises')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('editor.projects.index')" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>