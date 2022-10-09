<template>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div v-for="n in 2" :key="n" class="flex flex-col items-center justify-start rounded-lg bg-white text-center shadow">
            <div class="flex w-full items-center justify-between space-x-3 px-6 py-5">
                <div class="rounded-full h-9 w-9 bg-gray-100" />
                <div class="flex-1 truncate text-left">
                    <div class="h-3 w-56 rounded-lg bg-gray-100" />
                    <div class="mt-2 h-3 w-16 rounded-lg bg-gray-100" />
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-sm mt-12">
        <div>
            <div class="text-center">
                <h2 class="mt-4 text-lg font-medium text-gray-900">No editors assigned</h2>
                <p class="mt-1 text-sm text-gray-500">You haven't been given any assigned editors yet. Once you have been assigned some, they will show up here.</p>
            </div>
        </div>
    </div>
</template>