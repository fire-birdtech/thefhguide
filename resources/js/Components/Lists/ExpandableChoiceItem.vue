<script setup>
import { ref } from 'vue';
import { MinusIcon, PlusIcon } from '@heroicons/vue/24/outline';
import ResourceListItem from '@/Components/Lists/ResourceListItemPublic.vue';
import Header5 from '@/Components/Headers/Header5.vue';

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
        <div @click="expanded = !expanded" class="flex items-center justify-between text-stone-400 text-2xl cursor-pointer">
            <div class="flex items-center">
                <div class="inline-flex items-center flex-shrink-0 justify-center w-10 h-10 bg-stone-400 text-white font-display font-medium rounded-full">{{ listStyleAlpha[choice.order - 1] }}</div>
                <h4 class="ml-3 font-display font-medium">{{ choice.name }}</h4>
            </div>
            <div class="flex items-center">
                <MinusIcon v-if="expanded" class="h-8 w-8 flex-shrink-0" />
                <PlusIcon v-if="! expanded" class="h-8 w-8 flex-shrink-0" />
            </div>
        </div>
        <div v-show="expanded" class="py-8 prose max-w-none space-y-6">
            <template v-for="item in choice.content" :key="item.id">
                <div v-if="item.type === 'summary'">
                    <button @click="showSummary = ! showSummary" class="text-stone-500 font-medium hover:underline">Summary</button>
                    <div v-show="showSummary" v-html="item.data" />
                </div>
                <div v-else-if="item.type === 'resources'">
                    <Header5>Resources</Header5>
                    <ol>
                        <ResourceListItem v-for="(resource, index) in item.data" :key="index" :resource="resource" />
                    </ol>
                </div>
                <div v-else-if="item.type === 'exercises'">
                    <button @click="showExercises = ! showExercises" class="text-stone-500 font-medium hover:underline">Exercises</button>
                    <div v-show="showExercises" v-html="item.data" />
                </div>
                <div v-else-if="item.type === 'header'">
                    <Header5>{item.data}</Header5>
                </div>
                <div v-else v-html="item.data" />
            </template>
        </div>
    </li>
</template>