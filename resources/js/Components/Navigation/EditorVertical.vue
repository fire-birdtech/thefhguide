<script setup>
const navigation = [
    { name: 'Dashboard', href: route('editor.dashboard'), components: ['Editor/Dashboard'] },
];
</script>

<template>
    <aside class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
            <div class="flex-1 flex flex-col min-h-0">
                <div class="flex-1 flex flex-col py-8 overflow-y-auto">
                    <nav class="space-y-2 px-4" aria-label="Sidebar">
                        <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.components.includes($page.component) ? 'bg-gray-200 text-gray-900 font-semibold' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900', 'flex items-center px-3 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                            <span class="truncate">
                                {{ item.name }}
                            </span>
                        </Link>
                    </nav>
                </div>
            </div>
        </div>
    </aside>
</template>