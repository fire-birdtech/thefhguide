<script setup>
import { ref } from 'vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall.vue';

defineProps(['image_path','image_url','message']);

const emit = defineEmits(['set']);

const photoPreview = ref(null);
const photoInput = ref(null);

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];
    if (! photo) return;
    const reader = new FileReader();
    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };
    reader.readAsDataURL(photo);

    emit('set', photoInput.value.files[0]);
}
</script>

<template>
    <div class="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
        <BreezeLabel for="cover" value="Cover image" class="sm:mt-px sm:pt-1" />
        <div class="mt-1 sm:mt-0 sm:col-span-4">
            <input ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">
            <div v-show="! photoPreview && image_path">
                <img :src="image_url" class="block w-full h-72 rounded-lg bg-cover bg-no-repeat bg-center object-cover pointer-events-none">
            </div>
            <div v-show="photoPreview" class="mt-2">
                <span
                    class="block w-full h-72 rounded-lg bg-cover bg-no-repeat bg-center"
                    :style="'background-image: url(\'' + photoPreview + '\');'"
                />
            </div>
            <div :class="[image_path || photoPreview ? 'mt-3' : 'mt-0', 'space-x-4']">
                <SecondaryButtonSmall @click.prevent="$refs.photoInput.click()">
                    Select A New Cover Image
                </SecondaryButtonSmall>
            </div>
            <BreezeInputError class="mt-1" :message="message" />
        </div>
    </div>
</template>