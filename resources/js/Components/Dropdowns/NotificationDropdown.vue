<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { BellIcon } from '@heroicons/vue/24/outline';
import { ChevronDownIcon, InboxIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="sr-only">View notifications</span>
                <BellIcon class="h-6 w-6" aria-hidden="true" />
                <span v-if="$page.props.notifications.filter(n => n.read_at === null).length" class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-blue-400 ring-2 ring-white" />
            </MenuButton>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute -right-4 z-10 mt-2 w-72 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div v-if="$page.props.notifications.length" class="py-1">
                    <MenuItem v-for="notification in $page.props.notifications" :key="notification.id" v-slot="{ active }">
                        <Link :href="route('notifications.read', [notification])" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', notification.read_at === null ? 'font-bold' : 'font-normal', 'block px-4 py-3 text-xs']">
                            {{ notification.data.message }}
                        </Link>
                    </MenuItem>
                </div>
                <div v-else class="text-center px-4 py-6">
                    <InboxIcon class="mx-auto h-12 w-12 text-blue-200" />
                    <p class="mt-2 text-sm font-medium text-gray-900">No notifications yet</p>
                    <p class="mt-1 text-sm text-gray-500">We'll let you know when you have some.</p>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>