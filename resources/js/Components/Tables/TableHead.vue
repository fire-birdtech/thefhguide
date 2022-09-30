<script setup>
defineProps({
    cells: Object,
    actions: Boolean
});
</script>

<template>
    <thead class="bg-gray-50">
        <tr>
            <th v-for="(cell, key) in cells" :key="key" scope="col" class="py-2.5 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6"> {{ cell }} </th>
            <th v-if="actions" scope="col" class="relative py-2.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Manage</span>
            </th>
        </tr>
    </thead>
</template>