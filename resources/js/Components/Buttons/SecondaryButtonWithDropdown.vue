<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    actions: Array,
    buttonText: String
});

defineEmits(['open']);
</script>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton class="relative inline-flex bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto">
                {{ buttonText }}
                <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
            </MenuButton>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div v-for="action in actions" :key="action" v-show="!action[0]?.disabled" class="py-1">
                    <MenuItem v-for="item in action" :key="item" v-slot="{ active }">
                        <a v-if="item.target" :href="item.href" target="_blank" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2 text-sm']">
                            <component :is="item.icon" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                            {{ item.name }}
                        </a>
                        <Link v-else-if="item.as === 'link'" :href="item.href" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2 text-sm']">
                            <component :is="item.icon" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                            {{ item.name }}
                        </Link>
                        <button v-else-if="item.as === 'emitter'" @click="$emit(item.emit)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group w-full text-left flex items-center px-4 py-2 text-sm disabled:pointer-events-none disabled:cursor-none']">
                            <component :is="item.icon" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                            {{ item.name }}
                        </button>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>