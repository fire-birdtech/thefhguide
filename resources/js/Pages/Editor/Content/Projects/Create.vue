<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, useForm } from '@inertiajs/vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    collection: Object,
});

const project = useForm({
    name: "",
    collection_id: props.collection.id,
});

const submit = () => {
    project.post(route('editor.projects.store'));
}
</script>

<template>
    <Head title="Admin - Create Project" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3> Create Project </Header3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="space-y-6 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Project name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="project.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="project.errors.name" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('editor.collections.show', [collection.slug])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>