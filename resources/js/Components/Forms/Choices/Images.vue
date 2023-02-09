<script setup>
const files = [
    {
        title: 'IMG_4985.HEIC',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'IMG_5214.HEIC',
        size: '4 MB',
        source:
            'https://images.unsplash.com/photo-1614926857083-7be149266cda?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=512&q=80'
    },
    {
        title: 'IMG_4278.HEIC',
        size: '4.1 MB',
        source:
            'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80'
    },
];
</script>

<template>
    <div class="flex flex-col">
        <div>
            <span class="inline-flex items-center rounded-t bg-red-200 px-2 py-0.5 text-xs font-medium text-red-800">Images</span>
        </div>
        <div class="w-full border-2 border-red-200 rounded-b rounded-tr p-4">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 sm:gap-x-6 lg:grid-cols-5 xl:gap-x-8">
                <li v-for="file in files" :key="file.source" class="relative">
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-red-700 focus-within:opacity-40">
                        <img :src="file.source" alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                        <button type="button" class="absolute inset-0 focus:outline-none">
                            <span class="sr-only">View details for {{ file.title }}</span>
                        </button>
                    </div>
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ file.title }}</p>
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ file.size }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>