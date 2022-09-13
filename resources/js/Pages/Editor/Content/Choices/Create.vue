<script setup>
import AdminLayout from '@/Layouts/Admin';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';
import TextEditor from '@/Components/TextEditor';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';

const props = defineProps({
    goal: String,
});

const choice = useForm({
    name: '',
    goal_id: props.goal,
    summary: '',
    instructions: '',
    resources: '',
    review: '',
    exercises: '',
});

const submit = () => {
    choice.post(route('editor.choices.store'));
}
</script>

<template>
    <Head title="Admin - Create Choice" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Create Choice </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="space-y-6 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:pt-5">
                                    <BreezeLabel for="name" value="Choice name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="choice.summary" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.summary" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Instructions" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="choice.instructions" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.instructions" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Resources" optional="true" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="choice.resources" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.resources" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Review" optional="true" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="choice.review" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.review" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Exercises" optional="true" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="choice.exercises" />
                                        <BreezeInputError class="mt-1" :message="choice.errors?.exercises" />
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