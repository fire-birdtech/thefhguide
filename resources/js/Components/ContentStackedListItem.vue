<script setup>
import { computed } from 'vue';
import { CalendarIcon, ChevronRightIcon, FolderIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    name: String,
    parent: String,
    date: String,
    href: String,
});

let datetime = computed(() => props.date.split('T')[0]);
let formattedDate = computed(() => new Date(props.date).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}));
</script>

<template>
    <li>
        <Link :href="href" class="block hover:bg-gray-50">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                    <div class="truncate">
                        <div class="flex text-sm">
                            <p class="truncate font-medium text-blue-600">{{ name }}</p>
                            <p class="ml-1 flex-shrink-0 font-normal text-gray-500">in {{ parent }}</p>
                        </div>
                        <div class="mt-2 flex">
                            <div class="flex items-center text-xs text-gray-500">
                                <CalendarIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                <p>
                                    Updated on
                                    {{ ' ' }}
                                    <time :datetime="datetime">{{ formattedDate }}</time>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-5 flex-shrink-0">
                    <ChevronRightIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </div>
            </div>
        </Link>
    </li>
</template>