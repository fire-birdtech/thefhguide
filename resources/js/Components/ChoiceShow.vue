<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    choice: Object
});
</script>

<template>
    <div class="border-t border-gray-200">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Name</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3"> {{ choice.name }} </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Summary</dt>
                <dd class="mt-1 prose max-w-3xl text-sm text-gray-900 sm:mt-0 sm:col-span-3" v-html="choice.summary" />
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Instructions</dt>
                <dd class="mt-1 prose max-w-3xl text-sm text-gray-900 sm:mt-0 sm:col-span-3" v-html="choice.instructions" />
            </div>
            <div v-if="choice.resources" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Resources</dt>
                <dd class="mt-1 prose max-w-3xl text-sm text-gray-900 sm:mt-0 sm:col-span-3" v-html="choice.resources" />
            </div>
            <div v-if="choice.review" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Review</dt>
                <dd class="mt-1 prose max-w-3xl text-sm text-gray-900 sm:mt-0 sm:col-span-3" v-html="choice.review" />
            </div>
            <div v-if="choice.exercises" class="py-4 sm:py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Exercises</dt>
                <dd class="mt-1 prose max-w-3xl text-sm text-gray-900 sm:mt-0 sm:col-span-3" v-html="choice.exercises" />
            </div>
        </dl>
    </div>
</template>