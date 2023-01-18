<script setup>
import DraftItem from '@/Components/Drafts/DraftItem.vue';

defineProps({
    drafts: Array
});
</script>

<template>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4">
        <DraftItem v-for="draft in drafts" :key="draft.id" :draft="draft" />
    </ul>
</template>