<script setup>
import { ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { ArrowUpTrayIcon, BellAlertIcon } from '@heroicons/vue/24/solid';
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import InputWithLabel from '@/Components/InputWithLabel.vue';
import TextEditorWithLabel from '@/Components/TextEditorWithLabel.vue';
import PrimaryButtonWithDropdown from '@/Components/Buttons/PrimaryButtonWithDropdown.vue';
import PublishModal from '@/Components/PublishModal.vue';
import Header3 from '@/Components/Headers/Header3.vue';
import AddCoverImage from '@/Components/Forms/AddCoverImage.vue';
import ChoiceContent from '@/Components/Forms/Choices/ChoiceContent.vue';

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

const form = useForm({
    ...props.draft
});
const save = () => {
    form.put(route('editor.drafts.update', [props.draft.id]));
}
const publish = () => {
    form.put(route('editor.drafts.publish', [props.draft.id]));
}
const notify = () => {
    form.post(route('editor.drafts.notify', [props.draft.id]));
}

const options = [
    { name: 'Publish Draft', icon: ArrowUpTrayIcon, show: props.userCanPublish, action: 'publish' },
    { name: 'Ready for Publish', icon: BellAlertIcon, show: !props.userCanPublish, action: 'notify' }
];

const setImage = (value) => {
    form.image = value;
}

const setContent = (value) => {
    form.content = value;
}
</script>

<template>
    <Head title="Draft" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div>
                    <Header3> Draft: {{ form.name }} </Header3>
                </div>
                <div class="space-x-2">
                    <PrimaryButtonWithDropdown action="Save Draft" @save="save" @publish="confirm" @notify="notify" :options="options" />
                </div>
            </div>
            
            <div class="mt-4 bg-white rounded-md shadow">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <InputWithLabel label="Name" v-model="form.name" :message="form.errors?.name" />

                    <template v-if="draft.draftable_type === 'project'">
                        <AddCoverImage
                            :image_url="draft.cover_image_url"
                            :image_path="draft.cover_image_path"
                            :message="form.errors?.cover_image_path"
                            @set="setImage($event)"
                        />
                    </template>

                    <template v-if="draft.draftable_type === 'goal'">
                        <TextEditorWithLabel v-if="draft.summary" label="Summary" v-model="form.summary" :message="form.errors?.summary" />
                        <InputWithLabel label='"Shoe Me" Video' v-model="form.show_me_video_url" :message="form.errors?.show_me_video_url" />
                    </template>

                    <template v-if="draft.draftable_type === 'choice'">
                        <ChoiceContent :content="draft.content" @update="setContent($event)" />
                    </template>
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