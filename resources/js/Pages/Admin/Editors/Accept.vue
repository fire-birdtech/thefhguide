<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest';
import PrimaryButtonFullWidth from '@/Components/Buttons/PrimaryButtonFullWidth.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';

const props = defineProps({
    invitation: Object,
    hasAccount: Boolean,
});

const registerForm = useForm({
    name: props.invitation.name,
    email: props.invitation.email,
    id: props.invitation.id,
    role: props.invitation.role,
    admin_id: props.invitation.admin_id,
    password: '',
    password_confirmation: '',
});

const acceptForm = useForm({
    email: props.invitation.email,
    role: props.invitation.role,
    admin_id: props.invitation.admin_id,
    id: props.invitation.id,
});

const submitRegister = () => {
    registerForm.post(route('invitations.register'), {
        onFinish: () => registerForm.reset('password', 'password_confirmation'),
    });
}

const submitAccept = () => {
    acceptForm.post(route('invitations.accept'));
}
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Accept Invitation" />

        <div class="text-center sm:pt-1 sm:text-left">
            <p class="text-sm font-medium text-gray-500">Welcome,</p>
            <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ invitation.name }}</p>
        </div>
        <div class="mt-4">
            <template v-if="hasAccount">
                <p class="mt-1 text-sm text-gray-500">We see you already have an account for {{ invitation.email }}.</p>
                <div class="mt-8">
                    <PrimaryButtonFullWidth @click="submitAccept">Accept Invitation</PrimaryButtonFullWidth>
                </div>
            </template>
            <template v-else>
                <p class="mt-1 text-sm text-gray-500">Please complete your account by adding a password.</p>
                <form class="mt-3 mb-1" @submit.prevent="submitRegister">
                    <div>
                        <BreezeLabel for="name" value="Name" />
                        <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="registerForm.name" required autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="registerForm.email" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Password" />
                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="registerForm.password" required autofocus autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password_confirmation" value="Confirm Password" />
                        <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="registerForm.password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="mt-8">
                        <PrimaryButtonFullWidth>Register & Accept Invitation</PrimaryButtonFullWidth>
                    </div>
                </form>
            </template>
        </div>
    </BreezeGuestLayout>
</template>