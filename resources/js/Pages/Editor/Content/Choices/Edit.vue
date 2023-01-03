<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import TextEditor from '@/Components/TextEditor.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    choice: Object,
});

const submit = () => {
    Inertia.put(route('editor.choices.update', [props.choice.id]), props.choice);
}
</script>

<template>
    <Head :title="`Admin - Edit ${choice.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2"> Edit Choice: {{ choice.name }} </h3>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Goal name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-model="choice.summary" />
                            <BreezeInputError class="mt-1" :message="choice.errors?.summary" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Instructions" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-model="choice.instructions" />
                            <BreezeInputError class="mt-1" :message="choice.errors?.instructions" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Resources" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-if="choice.resources" v-model="choice.resources" />
                            <SecondaryButton @click.prevent="choice.resources = !choice.resources" v-else>Add resources</SecondaryButton>
                            <BreezeInputError class="mt-1" :message="choice.errors?.resources" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Review" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-if="choice.review" v-model="choice.review" />
                            <SecondaryButton @click.prevent="choice.review = !choice.review" v-else>Add review</SecondaryButton>
                            <BreezeInputError class="mt-1" :message="choice.errors?.review" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Exercises" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <TextEditor v-if="choice.exercises" v-model="choice.exercises" />
                            <SecondaryButton @click.prevent="choice.exercises = !choice.exercises" v-else>Add exercises</SecondaryButton>
                            <BreezeInputError class="mt-1" :message="choice.errors?.exercises" />
                        </div>
                    </div>
                    <div class="px-6 py-4 sm:border-t sm:border-gray-200">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('editor.choices.show', [choice.id])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>