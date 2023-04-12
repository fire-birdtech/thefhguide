<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Header3 from '@/Components/Headers/Header3.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import InputWithLabel from '@/Components/InputWithLabel.vue';
import AddCoverImage from '@/Components/Forms/AddCoverImage.vue';
import TextEditorWithLabel from '@/Components/TextEditorWithLabel.vue';
import ChoiceContent from '@/Components/Forms/Choices/ChoiceContent.vue';

const props = defineProps({
    type: String,
    parent_id: String,
});

const form = useForm({
    type: props.type,
    parent_id: props.parent_id,
    name: '',
    image: null,
    summary: null,
    show_me_video_url: null,
    content: null,
});

const setImage = (value) => {
    form.image = value;
}

const setContent = (value) => {
    form.content = value;
}

const submit = () => {
    form.post(route('editor.drafts.store'));
}
</script>

<template>
    <Head title="Create Draft" />

    <AdminLayout>
        <form @submit.prevent="submit" class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div>
                    <Header3> Create Draft </Header3>
                </div>
                <div class="space-x-2">
                    <PrimaryButton> Save </PrimaryButton>
                </div>
            </div>

            <div class="mt-4 bg-white rounded-md shadow">
                <div class="sm:divide-y sm:divide-gray-200">
                    <InputWithLabel label="Name" v-model="form.name" :message="form.errors?.name" />

                    <template v-if="type === 'project'">
                        <AddCoverImage :message="form.errors?.image" @set="setImage($event)" />
                    </template>

                    <template v-if="type === 'goal'">
                        <TextEditorWithLabel label="Summary" v-model="form.summary" :message="form.errors?.summary" />
                        <InputWithLabel label='"Shoe Me" Video' v-model="form.show_me_video_url" :message="form.errors?.show_me_video_url" />
                    </template>

                    <template v-if="type === 'choice'">
                        <ChoiceContent @update="setContent($event)" />
                    </template>
                </div>
            </div>
        </form>
    </AdminLayout>
</template>