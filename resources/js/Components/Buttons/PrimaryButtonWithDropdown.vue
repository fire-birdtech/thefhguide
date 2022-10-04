<script setup>
import { ref } from 'vue';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid';

const props = defineProps({
    action: String,
    options: Array
});

defineEmits(['notify','publish','save']);
</script>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div class="inline-flex divide-x divide-blue-700 rounded-md">
            <button @click="$emit('save')" class="inline-flex items-center rounded-l-md rounded-r-none bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40">
                {{ action }}
            </button>
            <MenuButton class="inline-flex items-center rounded-l-none rounded-r-md bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40">
                <ChevronDownIcon class="h-5 w-5 text-white" aria-hidden="true" />
            </MenuButton>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1">
                    <MenuItem v-for="(option, optionIdx) in options" :key="optionIdx" v-show="option.show" v-slot="{ active }">
                        <button @click="$emit(option.action)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group w-full text-left flex items-center px-4 py-2 text-sm']">
                            <component :is="option.icon" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                            {{ option.name }}
                        </button>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>