<script setup>
defineProps({});
</script>

<template>
    <div class="flex flex-col">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <slot />
                </table>
            </div>
        </div>
    </div>
</template>