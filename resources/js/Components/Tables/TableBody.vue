<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { EyeIcon, PencilSquareIcon } from '@heroicons/vue/24/outline';

defineProps({
    cells: Object,
    routeType: String,
    rows: Array
});
</script>

<template>
    <tbody class="bg-white">
        <tr v-for="(item, rowIdx) in rows" :key="rowIdx" :class="rowIdx % 2 === 0 ? undefined : 'bg-gray-50'">
            <td v-for="(cell, cellKey, cellIdx) in cells" :key="cellKey" :class="[cellIdx === 0 ? 'pl-4 pr-3 font-semibold sm:pl-6' : 'px-3', 'whitespace-nowrap py-2.5 text-sm text-gray-500']">
                <Link v-if="cellIdx === 0" :href="route(`editor.${routeType}.show`, [item.slug])" class="text-gray-900 hover:text-gray-700">{{ item[cellKey] }}</Link>
                <template v-else> {{ item[cellKey] }} </template>
            </td>
            <td class="flex justify-end whitespace-nowrap py-3 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                <Link :href="route(`editor.${routeType}.show`, [item.slug])" class="text-indigo-600 hover:text-indigo-900">
                    <EyeIcon class="h-6 w-6" />
                    <span class="sr-only">View {{ item.name }}</span>
                </Link>
                <Link v-if="! item.locked" :href="route(`editor.${routeType}.edit`, [item.slug])" class="text-indigo-600 hover:text-indigo-900">
                    <PencilSquareIcon class="h-6 w-6" />
                    <span class="sr-only">Edit {{ item.name }}</span>
                </Link>
            </td>
        </tr>
    </tbody>
</template>