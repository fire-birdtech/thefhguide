<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const props = defineProps(['user']);

const form = useForm({
    ...props.user
});

const updateUser = () => {
    form.put(route('user.update', [props.user.id]), {
        preserveState: true
    });
}

const security = useForm({
    current_password: '',
    password: '',
    password_confirmation: ''
});

const updatePassword = () => {
    security.put(route('user.update-password', [props.user.id]), {
        onSuccess: () => security.reset()
    });
}
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-8">
                    <div class="space-y-8 sm:space-y-5">
                        <form @submit.prevent="updateUser" class="space-y-6 sm:space-y-5">
                            <div class="px-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                                    <BreezeLabel for="name" value="Name" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <BreezeInput type="text" v-model="form.name" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="form.errors?.name" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                                    <BreezeLabel for="email" value="Email" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <BreezeInput type="email" v-model="form.email" id="name" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="form.errors?.email" />
                                    </div>
                                </div>
                                <div class="px-6 sm:border-t sm:border-gray-200 sm:pt-4">
                                    <PrimaryButton>Save</PrimaryButton>
                                </div>
                            </div>
                        </form>

                        <form @submit.prevent="updatePassword" class="space-y-6 pt-8 sm:space-y-5 sm:pt-12">
                            <div class="px-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Security Information</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">We want your account to be secure, make sure to set a stellar password.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                                    <BreezeLabel for="current_password" value="Current Password" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <BreezeInput type="password" v-model="security.current_password" id="current_password" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="security.errors?.current_password" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                                    <BreezeLabel for="password" value="New Password" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <BreezeInput type="password" v-model="security.password" id="password" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="security.errors?.password" />
                                    </div>
                                </div>
                                <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-4">
                                    <BreezeLabel for="password_confirmation" value="Confirm New Password" class="sm:mt-px sm:pt-2" />
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <BreezeInput type="password" v-model="security.password_confirmation" id="password_confirmation" class="block w-full" />
                                        <BreezeInputError class="mt-1" :message="security.errors?.password_confirmation" />
                                    </div>
                                </div>
                                <div class="px-6 sm:border-t sm:border-gray-200 sm:pt-4">
                                    <PrimaryButton>Update Password</PrimaryButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>