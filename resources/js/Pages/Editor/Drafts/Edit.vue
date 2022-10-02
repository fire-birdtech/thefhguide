<script setup>
import { ref, watch } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { ArrowUpTrayIcon, BellAlertIcon } from '@heroicons/vue/24/solid';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import InputWithLabel from '@/Components/InputWithLabel.vue';
import TextEditorWithLabel from '@/Components/TextEditorWithLabel.vue';
import PrimaryButtonWithDropdown from '@/Components/PrimaryButtonWithDropdown.vue';
import PublishModal from '@/Components/PublishModal.vue';

const props = defineProps({
    draft: Object,
    userCanPublish: Boolean
});
const open = ref(false);

const confirm = () => {
    open.value = true;
}
const close = () => {
    open.value =  false;
}
const save = () => {
    Inertia.put(route('editor.drafts.update', [props.draft.id]), props.draft);
}
const publish = () => {
    Inertia.put(route('editor.drafts.publish', [props.draft.id]), props.draft);
}
const notify = () => {
    Inertia.post(route('editor.drafts.notify', [props.draft.id]));
}

const options = [
    { name: 'Publish Draft', icon: ArrowUpTrayIcon, show: props.userCanPublish, action: 'publish' },
    { name: 'Ready for Publish', icon: BellAlertIcon, show: !props.userCanPublish, action: 'notify' }
];
</script>

<template>
    <Head title="Draft" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Draft: {{ draft.old_name }} </h3>
                </div>
                <div class="space-x-2">
                    <PrimaryButtonWithDropdown action="Save Draft" @save="save" @publish="confirm" @notify="notify" :options="options" />
                </div>
            </div>
            
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

        <Teleport to="body">
            <PublishModal :open="open" @close="close" @publish="publish">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Publish Draft </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Hooray! You're ready to publish this draft. Please click the publish button to confirm this action.</p>
                </div>
            </PublishModal>
        </Teleport>
    </AdminLayout>
</template>