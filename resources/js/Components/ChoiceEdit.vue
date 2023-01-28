<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import TextEditor from '@/Components/TextEditor.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import AddResource from '@/Components/Forms/AddResource.vue';
import ResourceListWrapper from './Lists/ResourceListWrapper.vue';
import ResourceListItem from './Lists/ResourceListItem.vue';

const props = defineProps({
    currentChoice: Object
});

const emits = defineEmits(['close']);

const show = ref(false);

const choice = useForm({
    ...props.currentChoice
});

const submit = () => {
    choice.put(route('editor.choices.update', [choice.id]), {
        preserveState: true,
        onFinish: () => {
            emits('close', choice);
        }
    });
}

const addResource = (event) => {
    choice.resources.push(event);
    show.value = false;
}
</script>

<template>
    <div class="border-t border-gray-200">
        <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Goal name" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <BreezeInput type="text" v-model="choice.name" id="name" class="block w-full" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.name" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Summary" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-model="choice.summary" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.summary" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Instructions" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-model="choice.instructions" />
                    <BreezeInputError class="mt-1" :message="choice.errors?.instructions" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Resources" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <div v-if="choice.resources.length" class="pb-4">
                        <ResourceListWrapper>
                            <ResourceListItem v-for="resource in choice.resources" :key="resource.id" :resource="resource" />
                        </ResourceListWrapper>
                    </div>
                    <AddResource v-if="show" @hide="addResource($event)" :choice-id="choice.id" />
                    <SecondaryButton @click.prevent="show = true" v-else>Add a resource</SecondaryButton>
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Review" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-if="choice.review" v-model="choice.review" />
                    <SecondaryButton @click.prevent="choice.review = !choice.review" v-else>Add review</SecondaryButton>
                    <BreezeInputError class="mt-1" :message="choice.errors?.review" />
                </div>
            </div>
            <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <BreezeLabel for="name" value="Exercises" class="sm:mt-px sm:pt-2" />
                <div class="mt-1 sm:mt-0 sm:col-span-4">
                    <TextEditor v-if="choice.exercises" v-model="choice.exercises" />
                    <SecondaryButton @click.prevent="choice.exercises = !choice.exercises" v-else>Add exercises</SecondaryButton>
                    <BreezeInputError class="mt-1" :message="choice.errors?.exercises" />
                </div>
            </div>
            <div class="px-6 py-4">
                <div class="flex justify-end">
                    <SecondaryButton type="button" @click="$emit('close')">Cancel</SecondaryButton>
                    <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                </div>
            </div>
        </form>
    </div>
</template>