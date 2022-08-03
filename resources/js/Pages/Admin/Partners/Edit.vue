<script setup>
import AdminLayout from '@/Layouts/Admin';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    partner: Object,
});

const submit = () => {
    Inertia.put(route('admin.partners.update', [props.partner.slug]), props.partner);
}
</script>

<template>
    <Head :title="`Admin - Edit ${partner.name}`" />

    <AdminLayout type="admin">
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2"> Edit Partner: {{ partner.name }} </h3>
            <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="name" value="Partner name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="partner.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="partner.errors?.name" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="website_url" value="Website URL" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="partner.website_url" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="partner.errors?.website_url" />
                        </div>
                    </div>
                    <div class="px-6 py-4 sm:border-t sm:border-gray-200">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.partners.show', [partner.slug])" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>