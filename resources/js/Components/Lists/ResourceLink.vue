<script setup>
import { DocumentTextIcon, StarIcon, VideoCameraIcon } from '@heroicons/vue/24/outline';

defineProps(['resource']);
</script>

<template>
    <li class="flex items-center space-x-2">
        <StarIcon class="h-5 w-5 flex-shrink-0" />
        <DocumentTextIcon class="h-5 w-5 flex-shrink-0" v-if="resource.type === 'document'" />
        <VideoCameraIcon class="h-5 w-5 flex-shrink-0" v-else-if="resource.type === 'video'" />
        <a :href="resource.link" target="_blank" rel="nofollow noopener noreferrer"> {{ resource.text }} </a>
    </li>
</template>