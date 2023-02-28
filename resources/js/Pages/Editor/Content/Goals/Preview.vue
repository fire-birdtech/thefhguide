<script setup>
import { Head } from '@inertiajs/vue3';
import ExpandableChoiceItem from '@/Components/Lists/ExpandableChoiceItem.vue';

defineProps({
    goal: Object
});
</script>

<template>
    <Head :title="`Preview of ${goal.name}`" />

    <div class="relative bg-stone-100">
        <div class="h-56 sm:h-96 md:absolute md:right-0 md:h-full md:w-1/2">
            <img class="h-full w-full object-cover border border-stone-900"
                :src="goal.project.cover_image_url"
                alt="" />
        </div>
        <div class="relative px-4 py-16 sm:px-6 lg:px-8">
            <div class="text-center space-y-8 md:w-1/2">
                <h2 class="text-3xl font-display font-bold tracking-normal text-stone-800 sm:text-4.5xl">Project {{ goal.project.order }}: {{ goal.project.name }}</h2>
                <h3 class="text-2.5xl font-display font-medium text-stone-800"><strong>Goal {{ goal.order }}:</strong> {{ goal.name }}</h3>
            </div>
        </div>
    </div>
    <div class="my-8 bg-stone-100 max-w-5xl mx-auto px-4 py-5 sm:px-12">
        <h4 class="text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">Goal {{ goal.order }}: {{ goal.section_name }}</h4>
        <div class="mt-6 prose max-w-5xl" v-html="goal.summary" />
        <h4 class="mt-16 text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">Choices</h4>
        <ul class="mt-8 space-y-8">
            <ExpandableChoiceItem v-for="choice in goal.choices" :key="choice.id" :choice="choice" />
        </ul>
    </div>
</template>