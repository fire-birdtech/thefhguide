<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { EyeIcon, PencilSquareIcon, XMarkIcon } from '@heroicons/vue/24/solid';
import ChoiceEdit from '@/Components/ChoiceEdit.vue';
import ChoiceShow from '@/Components/ChoiceShow.vue';

defineProps({
    item: Object
});

let expanded = ref(false);
</script>

<template>
    <li class="relative overflow-hidden bg-white rounded-md shadow ring-1 ring-black ring-opacity-5">
        <div class="block h-full">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                    <div class="truncate">
                        <div class="flex text-sm">
                            <p class="truncate font-medium">{{ item.name }}</p>
                            <!-- <p class="ml-1 flex-shrink-0 font-normal text-gray-500">in {{ choice.department }}</p> -->
                        </div>
                        <!-- <div class="mt-2 flex">
                            <div class="flex items-center text-sm text-gray-500">
                                <CalendarIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                <p>
                                Closing on
                                {{ ' ' }}
                                <time :datetime="position.closeDate">{{ position.closeDateFull }}</time>
                                </p>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
                        <div class="flex -space-x-1 overflow-hidden">
                            <img v-for="applicant in position.applicants" :key="applicant.email" class="inline-block h-6 w-6 rounded-full ring-2 ring-white" :src="applicant.imageUrl" :alt="applicant.name" />
                        </div>
                    </div> -->
                </div>
                <div class="ml-5 flex flex-shrink-0 space-x-2">
                    <template v-if="!expanded">
                        <div @click="expanded = 'show'" class="text-blue-600 hover:text-blue-900 cursor-pointer">
                            <EyeIcon class="h-6 w-6" />
                            <span class="sr-only">View {{ item.name }}</span>
                        </div>
                        <div @click="expanded = 'edit'" class="text-blue-600 hover:text-blue-900 cursor-pointer">
                            <PencilSquareIcon class="h-6 w-6" />
                            <span class="sr-only">Edit {{ item.name }}</span>
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
                <ChoiceEdit :current-choice="item" @close="expanded = false" />
            </div>
            <div v-show="expanded === 'show'">
                <ChoiceShow :choice="item" />
            </div>
        </div>
    </li>
</template>