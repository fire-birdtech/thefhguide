<script setup>
defineProps({
    cells: Object,
    actions: Boolean,
    order: Boolean
});
</script>

<template>
    <thead class="bg-gray-50">
        <tr>
            <th v-for="(cell, key, idx) in cells" :key="key" scope="col" :class="[idx === 0 ? 'pl-4 pr-3 sm:pl-6' : 'px-3', 'py-2.5 text-left text-xs font-medium uppercase tracking-wide text-gray-500']"> {{ cell }} </th>
            <th v-if="order" scope="col" class="relative w-8 px-3">Order</th>
            <th v-if="actions" scope="col" class="relative py-2.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Manage</span>
            </th>
        </tr>
    </thead>
</template>