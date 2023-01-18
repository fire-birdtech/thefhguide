<script setup>
import { Link } from '@inertiajs/vue3';
import { MenuItem } from '@headlessui/vue';
import moment from 'moment';

const props = defineProps({
    notification: Object
});

const readableDate = () => {
    return moment(props.notification.updated_at).fromNow();
}
</script>

<template>
    <MenuItem v-slot="{ active }">
        <Link :href="route('notifications.read', [notification])" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', notification.read_at === null ? 'font-bold' : 'font-normal', 'flex flex-col w-full px-4 py-2 text-xs']">
            {{ notification.data.message }}
            <span class="mt-1 text-gray-400">
                {{ readableDate() }}
            </span>
        </Link>
    </MenuItem>
</template>