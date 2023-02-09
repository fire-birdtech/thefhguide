<script setup>
import { ref } from 'vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import { XMarkIcon } from '@heroicons/vue/24/outline';

const show = ref(false);
const nameInput = ref(null);

const showAdd = () => {
    show.value = true;
    nameInput.value.focus();
}
</script>

<template>
    <div>
        <PrimaryButton v-if="! show" @click.prevent="showAdd" class="px-2 py-1 my-1.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">+ New resource</PrimaryButton>
        <form v-if="show" class="flex items-center border border-transparent rounded-md focus-within:border-purple-200">
            <input type="text" ref="nameInput" placeholder="Name" class="flex-1 border-none text-sm rounded-l-md focus:ring-transparent" autofocus>
            <input type="text" placeholder="External URL" class="flex-1 border-none text-sm focus:ring-transparent">
            <div class="flex items-center mr-1 space-x-2">
                <PrimaryButton class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">Add</PrimaryButton>
                <button type="button">
                    <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="show = false" />
                </button>
            </div>
        </form>
    </div>
</template>