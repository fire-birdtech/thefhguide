<script setup>
import { computed, ref } from 'vue';
import { DialogTitle } from '@headlessui/vue';
import { PencilSquareIcon, UserMinusIcon } from '@heroicons/vue/24/solid';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import Badge from '@/Components/Badge.vue';
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown.vue';
import DangerModal from '@/Components/Modals/DangerModal.vue';

const props = defineProps({
    user: Object,
});

const open = ref(false);

const close = () => {
    open.value = false;
}

const remove = () => {
    let form = useForm({
        _method: 'DELETE'
    });

    form.post(route('admin.editors.remove', props.user.id));
}

const usersMatch = usePage().props.value.auth.user.id === props.user.id;

const upperCaseRole = computed(() => props.user.roles[0].name.charAt(0).toUpperCase() + props.user.roles[0].name.slice(1));

const actions = [
    [
        { name: 'Edit', as: 'link', icon: PencilSquareIcon, href: route('admin.editors.edit', [props.user.id]) }
    ],
    [
        { name: `Remove ${upperCaseRole.value}`, as: 'emitter', icon: UserMinusIcon, emit: 'open', disabled: usersMatch }
    ]
];
</script>

<template>
    <Head :title="`Admin - ${user.name}`" />

    <AdminLayout>
        <div class="w-full py-8 px-4 sm:px-6 lg:px-8">
            <div>
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"> Editor Details: {{ user.name }} </h3>
                    </div>
                    <div class="ml-4 mt-2 space-x-2">
                        <SecondaryButtonWithDropdown button-text="Options" :actions="actions" @open="open = true" />
                    </div>
                </div>
                <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ user.name }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ user.email }} </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <Badge :text="user.roles[0].name" />
                            </dd>
                        </div>
                        <div v-if="user.admin" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Admin</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ user.admin.name }} </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <Teleport to="body">
            <DangerModal :open="open" action-text="Remove" emit-name="remove" @close="close" @remove="remove">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Remove {{ user.roles[0].name }} </DialogTitle>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to remove {{ user.name }}?</p>
                </div>
            </DangerModal>
        </Teleport>
    </AdminLayout>
</template>