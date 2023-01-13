<script setup>
import { inject } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const user = inject('user');

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: ''
});

const updatePassword = () => {
    form.put(route('settings.update-password', [user.id]), {
        onSuccess: () => form.reset()
    });
}
</script>

<template>
    <div class="space-y-6 sm:space-y-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Change Password</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">We want your account to be secure, make sure to set a
                stellar password.</p>
        </div>
        <form @submit.prevent="updatePassword" class="pt-4 border-t border-gray-200">
            <div class="max-w-md space-y-6 sm:space-y-5">
                <div>
                    <BreezeLabel for="current_password" value="Current Password" class="sm:mt-px sm:pt-2" />
                    <div class="mt-1">
                        <BreezeInput type="password" v-model="form.current_password" id="current_password"
                            class="block w-full" />
                        <BreezeInputError class="mt-1" :message="form.errors?.current_password" />
                    </div>
                </div>
                <div>
                    <BreezeLabel for="password" value="New Password" class="sm:mt-px sm:pt-2" />
                    <div class="mt-1">
                        <BreezeInput type="password" v-model="form.password" id="password" class="block w-full" />
                        <BreezeInputError class="mt-1" :message="form.errors?.password" />
                    </div>
                </div>
                <div>
                    <BreezeLabel for="password_confirmation" value="Confirm New Password" class="sm:mt-px sm:pt-2" />
                    <div class="mt-1">
                        <BreezeInput type="password" v-model="form.password_confirmation" id="password_confirmation"
                            class="block w-full" />
                        <BreezeInputError class="mt-1" :message="form.errors?.password_confirmation" />
                    </div>
                </div>
                <div class="sm:pt-2">
                    <PrimaryButton>Update password</PrimaryButton>
                </div>
            </div>
        </form>
    </div>
</template>