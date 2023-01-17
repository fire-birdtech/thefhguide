<script setup>
import AdminLayout from '@/Layouts/Admin.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import { Inertia } from '@inertiajs/inertia';
import Header3 from '@/Components/Headers/Header3.vue';

const props = defineProps({
    collection: Object,
});

const submit = () => {
    Inertia.put(route('editor.collections.update', [props.collection.slug]), props.collection);
}
</script>

<template>
    <Head :title="`Admin - Edit ${collection.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3> Edit Collection: {{ collection.name }} </Header3>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Collection name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="collection.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="collection.errors?.name" />
                        </div>
                    </div>
                    <div class="px-6 py-4 sm:border-t sm:border-gray-200">
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