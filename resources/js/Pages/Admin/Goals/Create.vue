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
    project: Number,
});

const goal = useForm({
    name: '',
    project_id: props.project,
    summary: null,
    show_me_video_url: '',
});

const submit = () => {
    goal.post(route('admin.goals.store'));
}
</script>

<template>
    <Head title="Admin - Create Goal" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Create Goal </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="space-y-6 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:pt-5">
                                    <BreezeLabel for="name" value="Goal name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="goal.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="goal.errors?.name" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <TextEditor v-model="goal.summary" />
                                        <BreezeInputError class="mt-1" :message="goal.errors?.summary" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value='"Show Me" video url' class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="goal.show_me_video_url" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="goal.errors?.show_me_video_url" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.projects.index')" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>