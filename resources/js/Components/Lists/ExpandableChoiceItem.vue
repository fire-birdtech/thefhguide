<script setup>
import { ref } from 'vue';
import { MinusIcon, PlusIcon } from '@heroicons/vue/24/outline';

defineProps({
    choice: Object
});

const expanded = ref(true);
const showSummary = ref(false);
const showExercises = ref(false);

const listStyleAlpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
</script>

<template>
    <li>
        <div @click="expanded = !expanded" class="flex items-center justify-between text-gray-400 text-2xl cursor-pointer">
            <div>
                <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-400 text-gray-100 rounded-full">{{ listStyleAlpha[choice.order - 1] }}</span>
                <span class="ml-3">{{ choice.name }}</span>
            </div>
            <div class="flex items-center">
                <MinusIcon v-if="expanded" class="h-8 w-8 flex-shrink-0" />
                <PlusIcon v-if="! expanded" class="h-8 w-8 flex-shrink-0" />
            </div>
        </div>
        <div v-show="expanded" class="py-8 prose max-w-none">
            <button @click="showSummary = ! showSummary" class="text-gray-500 font-medium hover:underline">Summary</button>
            <div v-show="showSummary" v-html="choice.summary" />
            <div v-html="choice.instructions" />
            <div v-if="choice.resources">
                <div class="text-xl font-medium">Resources</div>
                <div v-html="choice.resources" />
            </div>
            <div v-if="choice.review" v-html="choice.review" />
            <button @click="showExercises = ! showExercises" class="text-gray-500 font-medium hover:underline">Exercises</button>
            <div v-show="showExercises" v-html="choice.exercises" />
        </div>
    </li>
</template>