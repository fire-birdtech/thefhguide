<script setup>
import { inject } from 'vue';
import { useForm } from '@inertiajs/vue3';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import Header3 from '@/Components/Headers/Header3.vue';

const user = inject('user');

const form = useForm({
    ...user
});

const submit = () => {
    form.put(route('settings.update-profile', [user.id]));
}
</script>

<template>
    <div class="space-y-6 sm:space-y-5">
        <div>
            <Header3>Public Profile</Header3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
        </div>
        <form @submit.prevent="submit" class="pt-4 border-t border-gray-200">
            <div class="max-w-md space-y-6 sm:space-y-5">
                <div>
                    <BreezeLabel for="name" value="Name" />
                    <div class="mt-1">
                        <BreezeInput type="text" v-model="form.name" id="name" class="block w-full" />
                        <BreezeInputError class="mt-1" :message="form.errors?.name" />
                    </div>
                </div>
                <div>
                    <BreezeLabel for="email" value="Email" />
                    <div class="mt-1">
                        <BreezeInput type="email" v-model="form.email" id="name" class="block w-full" />
                        <BreezeInputError class="mt-1" :message="form.errors?.email" />
                    </div>
                </div>
                <div class="sm:pt-2">
                    <PrimaryButton>Update profile</PrimaryButton>
                </div>
            </div>
        </form>
    </div>
</template>