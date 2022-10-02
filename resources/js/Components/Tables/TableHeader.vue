<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    addLink: String,
    addText: String,
    header: String
});
</script>

<template>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h3 class="leading-6 font-medium text-gray-900"> {{ header }} </h3>
        </div>
        <div v-if="addLink && addText && $page.props.currentUserRole !== 'guest'" class="ml-4 space-x-2">
            <PrimaryButton :href="addLink" as="link"> {{ addText }} </PrimaryButton>
        </div>
    </div>
</template>