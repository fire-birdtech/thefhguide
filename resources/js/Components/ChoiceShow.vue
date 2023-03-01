<script setup>
import { Link } from '@inertiajs/vue3';
import ResourceListItem from '@/Components/Lists/ResourceListItemPublic.vue';

defineProps({
    choice: Object
});
</script>

<template>
    <div class="border-t border-gray-200">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Name</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7"> {{ choice.name }} </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Content</dt>
                <dd class="mt-1 text-sm text-gray-900 prose max-w-none space-y-6 sm:mt-0 sm:col-span-7">
                    <template v-for="item in choice.content" :key="item.id">
                        <div v-if="item.type === 'summary'">
                            <div class="text-stone-500 font-medium hover:underline">Summary</div>
                            <div v-html="item.data" />
                        </div>
                        <div v-else-if="item.type === 'resources'">
                            <div class="text-xl font-medium">Resources</div>
                            <ol>
                                <ResourceListItem v-for="(resource, index) in item.data" :key="index" :resource="resource" />
                            </ol>
                        </div>
                        <div v-else-if="item.type === 'exercises'">
                            <div class="text-stone-500 font-medium hover:underline">Exercises</div>
                            <div v-html="item.data" />
                        </div>
                        <div v-else v-html="item.data" />
                    </template>
                </dd>
            </div>
        </dl>
    </div>
</template>