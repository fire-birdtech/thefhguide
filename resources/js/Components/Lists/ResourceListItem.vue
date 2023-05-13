<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { DocumentTextIcon, PencilSquareIcon, TrashIcon, VideoCameraIcon } from '@heroicons/vue/24/outline';
import { XMarkIcon } from '@heroicons/vue/24/solid';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const props = defineProps(['resource']);

const emit = defineEmits(['update'])

const view = ref('show');

const form = useForm({
    ...props.resource
});

const submit = () => {
    form.put(route('editor.resources.update'), {
        preserveScroll: true,
        preserveState: true,
    });
}

const saveResource = () => {
    submit();
    view.value = "show";
}
</script>

<template>
    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
        <div v-if="view ==='show'" class="flex w-full flex-col flex-wrap">
            <span class="ml-2">{{ form.description }}</span>
            <ul class="mt-3 ml-4 space-y-1">
                <li v-for="link in form.links" :key="link" class="flex">
                    <DocumentTextIcon v-if="link.type === 'document'" class="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden="true" />
                    <VideoCameraIcon v-else-if="link.type === 'video'" class="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden="true" />
                    <a :href="link.link" class="pl-2">{{ link.text }}</a>
                </li>
            </ul>
        </div>
        <div v-if="view ==='edit'" class="flex w-full items-center">
            <form class="w-full flex flex-col items-center">
                <div class="w-full flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                    <input type="text" v-model="form.description" placeholder="Description" class="flex-1 border-none text-sm rounded-l-md focus:ring-transparent">
                    <div class="flex items-center ml-2 mr-1 space-x-2">
                        <PrimaryButton @click.prevent="saveResource" class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300" :disabled="resource.links.length < 1">Save</PrimaryButton>
                        <button type="button" class="rounded hover:bg-purple-100">
                            <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="view = 'show'" />
                        </button>
                    </div>
                </div>
                <div class="w-full pl-4 mt-1 space-y-1">
                    <div v-for="(link, key) in form.links" :key="key" class="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                        <input type="text" v-model="link.text" placeholder="Name" class="flex-1 border-none text-sm rounded-l-md focus:ring-transparent" autofocus>
                        <input type="text" v-model="link.link" placeholder="External URL" class="flex-1 border-none text-sm focus:ring-transparent">
                        <select id="location" v-model="link.type" name="location" class="border-none py-2 pl-3 pr-10 text-sm focus:ring-transparent">
                            <option value="document">Document</option>
                            <option value="video">Video</option>
                        </select>
                        <div class="flex items-center ml-2 mr-1">
                            <button type="button" class="rounded hover:bg-purple-100">
                                <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="remove(key)" />
                            </button>
                        </div>
                    </div>
                    <PrimaryButton @click.prevent="addLink()" class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">+ Add resource link</PrimaryButton>
                </div>
            </form>
        </div>
        <div v-if="view === 'show'" class="ml-4 flex-shrink-0 flex space-x-2">
            <div @click="view = 'edit'" class="text-blue-600 hover:text-blue-900 cursor-pointer">
                <PencilSquareIcon class="h-6 w-6" />
                <span class="sr-only">View resource</span>
            </div>
            <div class="text-blue-600 hover:text-blue-900 cursor-pointer">
                <TrashIcon class="h-6 w-6" />
                <span class="sr-only">Edit resource</span>
            </div>
        </div>
    </li>
</template>