<script setup>
import VerticalNav from '@/Components/Navigation/SettingsVertical.vue';
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto flex sm:px-6 lg:px-8">
            <VerticalNav />
            <div class="flex flex-1 flex-col">
                <main class="flex-1 pl-8">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>