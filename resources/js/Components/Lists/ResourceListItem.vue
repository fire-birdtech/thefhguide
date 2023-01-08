<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { DocumentTextIcon } from '@heroicons/vue/24/outline'
import PrimaryTextButton from '@/Components/Buttons/PrimaryTextButton.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';

const props = defineProps(['resource']);

const view = ref('show');

const form = useForm({
    ...props.resource
});

const submit = () => {
    form.put(route('editor.resources.update', [props.resource.id]), {
        preserveScroll: true,
        preserveState: true,
        onFinish: () => {
            view.value = 'show'
        }
    });
}
</script>

<template>
    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
        <div v-if="view ==='show'" class="flex w-0 flex-1 items-center">
            <DocumentTextIcon class="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden="true" />
            <span class="ml-2 w-0 flex-1 truncate">{{ form.name }}</span>
        </div>
        <div v-if="view ==='edit'" class="flex w-0 flex-1 items-center">
            <form @submit.prevent="submit" class="w-full flex items-end space-x-3">
                <div class="flex-1">
                    <BreezeLabel value="Name" />
                    <BreezeInput type="text" class="mt-1 w-full" v-model="form.name" />
                </div>
                <div class="flex-1">
                    <BreezeLabel value="External URL" />
                    <BreezeInput type="text" class="mt-1 w-full" v-model="form.url" />
                </div>
                <div>
                    <PrimaryButton type="submit" class="mr-2">Save</PrimaryButton>
                    <SecondaryButton type="button" @click="view = 'show'">Cancel</SecondaryButton>
                </div>
            </form>
        </div>
        <div v-if="view === 'show'" class="ml-4 flex-shrink-0">
            <PrimaryTextButton @click.prevent="view = 'edit'">Edit</PrimaryTextButton>
        </div>
    </li>
</template>