<script setup>
import AdminLayout from '@/Layouts/Admin';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input';
import BreezeInputError from '@/Components/InputError';
import BreezeLabel from '@/Components/Label';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';

const partner = useForm({
    name: "",
    website_url: "",
});

const submit = () => {
    partner.post(route('admin.partners.store'));
}
</script>

<template>
    <Head title="Admin Partners Create" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2"> Create Partner </h3>
            <div class="mt-4 bg-white rounded-md shadow">
                <!-- <form @submit.prevent="submit" class="space-y-6 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div class="mt-6 space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="name" value="Partner name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="partner.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="partner.errors.name" />
                                    </div>
                                </div>

                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <BreezeLabel for="website_url" value="Website URL" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-4">
                                        <BreezeInput type="text" v-model="partner.website_url" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="partner.errors.website_url" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pt-5">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.partners.index')" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form> -->
                <form @submit.prevent="submit" class="sm:divide-y sm:divide-gray-200">
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                        <BreezeLabel for="name" value="Partner name" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="partner.name" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="partner.errors.name" />
                        </div>
                    </div>
                    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
                        <BreezeLabel for="website_url" value="Website URL" class="sm:mt-px sm:pt-2" />
                        <div class="mt-1 sm:mt-0 sm:col-span-4">
                            <BreezeInput type="text" v-model="partner.website_url" id="name" class="block w-full" />
                            <BreezeInputError class="mt-1" :message="partner.errors.website_url" />
                        </div>
                    </div>
                    <div class="px-6 py-4 sm:border-t sm:border-gray-200">
                        <div class="flex justify-end">
                            <SecondaryButton :href="route('admin.partners.index')" as="link">Cancel</SecondaryButton>
                            <PrimaryButton type="submit" class="ml-3">Save</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>