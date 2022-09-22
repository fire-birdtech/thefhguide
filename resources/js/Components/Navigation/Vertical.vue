<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/runtime-core';

const admin = computed(() => usePage().canManageEditors);

const navigation = [
    { name: 'Dashboard', href: admin ? route('admin.dashboard') : route('editor.dashboard'), show: true, components: ['Admin/Dashboard', 'Editor/Dashboard'] },
    { name: 'Content', href: route('editor.content.index'), show: true, components: [
        'Editor/Content/Index', 'Editor/Content/Collections/Index','Editor/Content/Collections/Create','Editor/Content/Collections/Show','Editor/Content/Collections/Edit',
        'Editor/Content/Projects/Index','Editor/Content/Projects/Create','Editor/Content/Projects/Show','Editor/Content/Projects/Edit',
        'Editor/Content/Goals/Index','Editor/Content/Goals/Create','Editor/Content/Goals/Show','Editor/Content/Goals/Edit',
        'Editor/Content/Choices/Index','Editor/Content/Choices/Create','Editor/Content/Choices/Show','Editor/Content/Choices/Edit',
    ]},
    { name: 'Assignments', href: route('admin.assignments.index'), show: admin, components: [
        'Admin/Assignments/Index'
    ]},
    { name: 'Editors', href: route('admin.editors.index'), show: admin, components: [
        'Admin/Editors/Index','Admin/Editors/Create','Admin/Editors/Show','Admin/Editors/Edit'
    ]},
];
</script>

<template>
    <aside class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
            <div class="flex-1 flex flex-col min-h-0">
                <div class="flex-1 flex flex-col py-8 overflow-y-auto">
                    <nav class="space-y-2 px-4" aria-label="Sidebar">
                        <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.components.includes($page.component) ? 'bg-gray-200 text-gray-900 font-semibold' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900', 'group flex items-center px-3 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                            <span class="truncate">
                                {{ item.name }}
                            </span>
                            <span v-if="item.count" :class="[item.current ? 'bg-white' : 'bg-gray-100 text-gray-600 group-hover:bg-gray-200', 'ml-auto inline-block py-0.5 px-3 text-xs rounded-full']">
                                {{ item.count }}
                            </span>
                        </Link>
                    </nav>
                </div>
            </div>
        </div>
    </aside>
</template>