<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import { EyeIcon, PencilSquareIcon } from '@heroicons/vue/24/solid';
import Badge from '@/Components/Badge.vue';

const props = defineProps({
    actions: Object|Boolean,
    adminRouteType: String,
    cells: Object,
    routeType: String,
    rows: Array
});

const convertModel = (model) => {
    return model.split('\\')[2];
}

const editRoute = (item) => {
    return props.routeType !== null ? route(`${props.adminRouteType || props.routeType}.edit`, [item.slug ? item.slug : item.id]) : '#';
}
</script>

<template>
    <tbody class="bg-white">
        <tr v-for="(item, rowIdx) in rows" :key="rowIdx" :class="rowIdx % 2 === 0 ? undefined : 'bg-gray-50'">
            <td v-for="(cell, cellKey, cellIdx) in cells" :key="cellKey" :class="[cellIdx === 0 ? 'pl-4 pr-3 sm:pl-6' : 'px-3', 'whitespace-nowrap py-2.5 text-sm text-gray-500']">
                <Link v-if="cellIdx === 0 && cellKey !== 'assignable'" :href="route(`${routeType}.show`, [item.slug ? item.slug : item.id])" class="text-gray-900 hover:text-gray-700 font-semibold">{{ item[cellKey] }}</Link>
                <template v-else-if="cellIdx === 0 && cellKey === 'assignable'">{{ item[cellKey].name }}</template>
                <template v-else-if="cellKey === 'type'">{{ convertModel(item.assignable_type) }}</template>
                <Badge v-else-if="cellKey === 'status'" :text="item.status" />
                <Badge v-else-if="cellKey === 'role'" :text="item.roles[0].name" />
                <template v-else-if="cellKey === 'assignable' || cellKey === 'user'"> {{ item[cellKey].name }} </template>
                <template v-else-if="cellKey.includes('_at')">
                    {{ new Date(item[cellKey]).toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}
                </template>
                <template v-else> {{ item[cellKey] }} </template>
            </td>
            <td v-if="actions" class="flex justify-end whitespace-nowrap py-3 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                <Link v-if="actions.view" :href="route(`${routeType}.show`, [item.slug ? item.slug : item.id])" class="text-blue-600 hover:text-blue-900">
                    <EyeIcon class="h-6 w-6" />
                    <span class="sr-only">View {{ item.name }}</span>
                </Link>
                <Link v-show="! item.locked" v-if="actions.edit" :href="editRoute(item)" class="text-blue-600 hover:text-blue-900">
                    <PencilSquareIcon class="h-6 w-6" />
                    <span class="sr-only">Edit {{ item.name }}</span>
                </Link>
            </td>
        </tr>
    </tbody>
</template>