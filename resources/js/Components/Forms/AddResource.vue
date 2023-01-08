<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';

const props = defineProps(['choiceId']);

const emits = defineEmits(['hide']);

const resource = useForm({
    name: '',
    url: '',
    choice_id: props.choiceId
});

const submit = () => {
    resource.post(route('editor.resources.store'), {
        preserveScroll: true,
        preserveState: true,
        onFinish: () => {
            emits('hide');
        }
    });
}
</script>

<template>
    <div class="pb-4">
        <form @submit.prevent="submit" class="w-full flex items-end space-x-3">
            <div class="flex-1">
                <BreezeLabel value="Name" />
                <BreezeInput type="text" class="mt-1 w-full" v-model="resource.name" />
            </div>
            <div class="flex-1">
                <BreezeLabel value="External URL" />
                <BreezeInput type="text" class="mt-1 w-full" v-model="resource.url" />
            </div>
            <div>
                <PrimaryButton type="submit" class="mr-2">Add</PrimaryButton>
                <SecondaryButton type="button" @click="$emit('hide')">Cancel</SecondaryButton>
            </div>
        </form>
    </div>
</template>