<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Cog8ToothIcon, LockClosedIcon, UserCircleIcon } from '@heroicons/vue/24/outline';

const navigation = [
    { name: 'Profile', href: route('settings.profile'), icon: UserCircleIcon, component: 'Settings/Profile' },
    { name: 'Account', href: route('settings.account'), icon: Cog8ToothIcon, component: 'Settings/Account' },
    { name: 'Security', href: route('settings.security'), icon: LockClosedIcon, component: 'Settings/Security' },
];
</script>

<template>
    <div class="hidden md:flex md:w-64 md:flex-col">
        <div class="flex flex-grow flex-col overflow-y-auto">
            <div class="flex flex-grow flex-col">
                <nav class="flex-1 space-y-1 px-2 pb-4">
                    <Link v-for="item in navigation" :key="item.name" :href="item.href"
                        :class="[item.component === $page.component ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                        <component :is="item.icon"
                            :class="[item.component === $page.component ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']"
                            aria-hidden="true" />
                        {{ item.name }}
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>