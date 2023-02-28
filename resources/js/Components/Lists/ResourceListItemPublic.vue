<script setup>
import ResourceLink from '@/Components/Lists/ResourceLink.vue';

defineProps(['resource']);
</script>

<template>
    <li>
        <span> {{ resource.description }} </span>
        <ul class="list-none">
            <ResourceLink v-for="(item, index) in resource.links" :key="index" :resource="item" />
        </ul>
    </li>
</template>