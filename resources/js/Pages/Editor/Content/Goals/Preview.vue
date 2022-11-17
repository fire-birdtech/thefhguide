<script setup>
import ExpandableChoiceItem from '@/Components/Lists/ExpandableChoiceItem.vue';

defineProps({
    goal: Object
});
</script>

<template>
    <div class="relative bg-gray-100">
        <div class="h-56 sm:h-72 md:absolute md:right-0 md:h-full md:w-1/2">
            <img class="h-full w-full object-cover"
                :src="goal.project.cover_image_url"
                alt="" />
        </div>
        <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="text-center md:mr-auto md:w-1/2 md:pr-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Project {{ goal.project.order }}: {{ goal.project.name }}</h2>
                <p class="mt-6 text-2xl text-gray-900"><strong>Goal {{ goal.order }}:</strong> {{ goal.name }}</p>
            </div>
        </div>
    </div>
    <div class="mt-8 bg-gray-100 max-w-5xl mx-auto px-4 py-5 sm:px-8">
        <h3 class="text-2xl font-medium leading-8 text-gray-900 sm:truncate sm:tracking-tight">Goal {{ goal.order }}: {{ goal.name }}</h3>
        <div class="mt-6 prose max-w-5xl" v-html="goal.summary" />
        <h4 class="mt-16 text-2xl font-medium leading-8 text-gray-900 sm:truncate sm:tracking-tight">Choices</h4>
        <ul class="mt-8 space-y-8">
            <ExpandableChoiceItem v-for="choice in goal.choices" :key="choice.id" :choice="choice" />
        </ul>
    </div>
</template>