<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import InputWithLabel from '@/Components/InputWithLabel.vue';
import TextEditorWithLabel from '@/Components/TextEditorWithLabel.vue';

defineProps({
    draft: Object
});
</script>

<template>
    <Head title="Draft" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Draft: {{ draft.old_name }} </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <InputWithLabel label="Name" v-model="draft.new_name" :message="draft.errors?.new_name" />

                    <TextEditorWithLabel v-if="draft.new_summary" label="Summary" v-model="draft.new_summary" :message="draft.errors?.new_summary" />

                    <TextEditorWithLabel v-if="draft.new_instructions" label="Instructions" v-model="draft.new_instructions" :message="draft.errors?.new_instructions" />

                    <TextEditorWithLabel v-if="draft.new_resources" label="Resources" v-model="draft.new_resources" :message="draft.errors?.new_resources" />

                    <TextEditorWithLabel v-if="draft.new_review" label="Review" v-model="draft.new_review" :message="draft.errors?.new_review" />

                    <TextEditorWithLabel v-if="draft.new_exercises" label="Exercises" v-model="draft.new_exercises" :message="draft.errors?.new_exercises" />
                </form>
            </div>
        </div>
    </AdminLayout>
</template>