<script setup>
import { ref } from 'vue';
import { PhotoIcon } from '@heroicons/vue/24/outline';
import { XMarkIcon } from '@heroicons/vue/24/solid';
import Header from '@/Components/Forms/Choices/ContentBlockHeader.vue';

const emit = defineEmits(['delete','update']);

const imageInput = ref(null);

const files = ref([]);

const updateParent = () => {
    emit('update', files.value);
}

const updateFilesList = () => {
    const image = imageInput.value.files[0];
    if (! image) return;
    const reader = new FileReader();
    reader.onload = (e) => {
        files.value.push(e.target.result);
    }
    reader.readAsDataURL(image);

    updateParent();
}

const removeImage = (file) => {
    files.value = files.value.filter(value => value !== file);
}

const deleteBlock = () => {
    files.value = [];
    emit('delete');
}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <Header color="red" @remove="deleteBlock">Images</Header>
        </div>
        <div class="w-full border-2 border-red-200 rounded-b rounded-tr p-4">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-4 sm:grid-cols-4 lg:grid-cols-5">
                <li class="relative">
                    <input ref="imageInput" type="file" class="hidden" @change="updateFilesList" />
                    <div class="group aspect-w-10 aspect-h-7 block h-full overflow-hidden rounded bg-gray-100 hover:bg-red-200 transition-colors">
                        <button type="button" class="absolute inset-0 focus:outline-none" @click.prevent="$refs.imageInput.click()">
                            <div class="text-center">
                                <PhotoIcon class="mx-auto h-12 w-12 text-gray-400 group-hover:text-red-400 transition-colors" />
                                <p class="mt-2 text-sm font-medium text-gray-700 group-hover:text-red-700 transition-colors">Add a new image</p>
                            </div>
                        </button>
                    </div>
                </li>
                <li v-for="file in files" :key="file" class="relative">
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded bg-red-200 focus-within:ring-2 focus-within:ring-red-700 focus-within:opacity-40">
                        <img :src="file" alt="" class="pointer-events-none object-cover group-hover:opacity-50" />
                        <div class="absolute inset-0">
                            <button type="button" @click.prevent="removeImage(file)" class="hidden absolute right-0 top-0 p-2 group-hover:block">
                                <XMarkIcon class="h-8 w-8 text-white" />
                            </button>
                        </div>
                    </div>
                    <!-- <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ file.title }}</p>
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ file.size }}</p> -->
                </li>
            </ul>
        </div>
    </div>
</template>