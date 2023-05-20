<script setup>
import { ref } from 'vue';
import { EyeIcon, PencilSquareIcon, XMarkIcon } from '@heroicons/vue/24/solid';
import ChoiceEdit from '@/Components/ChoiceEdit.vue';
import ChoiceShow from '@/Components/ChoiceShow.vue';

defineProps({
    choice: Object
});

defineEmits(['reload']);

let expanded = ref(false);

const listStyleAlpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
</script>

<template>
    <li class="relative overflow-hidden bg-white rounded-md shadow ring-1 ring-black ring-opacity-5">
        <div class="block h-full">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                    <div class="truncate">
                        <div class="flex items-center text-sm">
                            <div class="inline-flex items-center justify-center font-bold w-6 h-6 bg-gray-300 text-white rounded-full mr-2">{{ listStyleAlpha[choice.order - 1] }}</div>
                            <p class="truncate font-medium">{{ choice.name }}</p>
                        </div>
                    </div>
                </div>
                <div class="ml-5 flex flex-shrink-0 space-x-2">
                    <template v-if="!expanded">
                        <div @click="expanded = 'show'" class="text-blue-600 hover:text-blue-900 cursor-pointer">
                            <EyeIcon class="h-6 w-6" />
                            <span class="sr-only">View {{ choice.name }}</span>
                        </div>
                        <div @click="expanded = 'edit'" class="text-blue-600 hover:text-blue-900 cursor-pointer">
                            <PencilSquareIcon class="h-6 w-6" />
                            <span class="sr-only">Edit {{ choice.name }}</span>
                        </div>
                    </template>
                    <template v-if="expanded">
                        <div @click="expanded = false" class="text-gray-500 hover:text-gray-700 cursor-pointer">
                            <XMarkIcon class="h-6 w-6" />
                        </div>
                    </template>
                </div>
            </div>
            <div v-show="expanded === 'edit'">
                <ChoiceEdit :current-choice="choice" @close="expanded = false;$emit('reload')" />
            </div>
            <div v-show="expanded === 'show'">
                <ChoiceShow :choice="choice" />
            </div>
        </div>
    </li>
</template>