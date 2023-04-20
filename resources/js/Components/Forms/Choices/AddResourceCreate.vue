<script setup>
import { reactive, ref, watch } from 'vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import { XMarkIcon } from '@heroicons/vue/24/outline';

const emit = defineEmits(['add']);

const show = ref(false);

const resource = reactive({
    description: "",
    links: []
});

const resetResource = () => {
    resource.description = "";
    resource.links = [];
}

const addLink = () => {
    resource.links.push({
        text: "",
        link: "",
        type: ""
    });
}

const remove = (key) => {
    resource.links = resource.links.filter(link => link !== resource.links[key]);
}

const addResource = () => {
    emit('add', resource);
    show.value = false;
}

const addHighlight = (key) => {
    let resourceLinkKey = resource.links.findIndex(link => link === resource.links[key]);
    if (resource.links[resourceLinkKey].highlights === undefined) {
        resource.links[resourceLinkKey].highlights = [];
    }
    resource.links[resourceLinkKey].highlights.push({
        text: "",
        link: "",
    });
}

const removeHighlight = (resourceLinkKey, highlightKey) => {
    resource.links[resourceLinkKey].highlights = resource.links[resourceLinkKey].highlights.filter(highlight => highlight !== resource.links[resourceLinkKey].highlights[highlightKey]);
}

const addIframe = (key) => {
    resource.links[resource.links.findIndex(link => link === resource.links[key])].iframe = "";
}

const removeIframe = (key) => {
    delete resource.links[resource.links.findIndex(link => link === resource.links[key])].iframe;
}

watch(show, (newValue, oldValue) => {
    if (newValue === true) {
        resetResource();
    }
})
</script>

<template>
    <div>
        <PrimaryButton v-if="! show" @click.prevent="show = true" class="px-2 py-1 my-1.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">+ New resource</PrimaryButton>
        <form v-if="show">
            <div class="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                <input type="text" v-model="resource.description" placeholder="Description" class="flex-1 border-none text-sm rounded-l-md focus:ring-transparent">
                <div class="flex items-center ml-2 mr-1 space-x-2">
                    <PrimaryButton @click.prevent="addResource" class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300" :disabled="resource.links.length < 1">Add</PrimaryButton>
                    <button type="button" class="rounded hover:bg-purple-100">
                        <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="show = false" />
                    </button>
                </div>
            </div>
            <div class="ml-4 mt-1 space-y-1">
                <div v-for="(link, key) in resource.links" :key="key">
                    <div class="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
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
                    <div v-if="link.type === 'video'" class="ml-4 mt-0.5">
                        <div class="space-y-0.5">
                            <div v-if="link.iframe !== undefined" class="w-full">
                                <div class="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                                    <input type="text" v-model="link.iframe" placeholder="Video Iframe" class="flex-1 border-none text-xs rounded-l-md focus:ring-transparent" />
                                    <div class="flex items-center ml-2 mr-1">
                                        <button type="button" class="rounded hover:bg-purple-100">
                                            <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="removeIframe(key)" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-for="(highlight, index) in link.highlights" :key="index" class="w-full">
                                <div class="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                                    <input type="text" v-model="highlight.text" placeholder="Highlight Text" class="flex-1 border-none text-xs rounded-l-md focus:ring-transparent">
                                    <input type="text" v-model="highlight.link" placeholder="Highlight Link" class="flex-1 border-none text-xs focus:ring-transparent">
                                    <div class="flex items-center ml-2 mr-1">
                                        <button type="button" class="rounded hover:bg-purple-100">
                                            <XMarkIcon class="w-5 h-5 text-purple-700" @click.prevent="removeHighlight(key, index)" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-x-1">
                            <PrimaryButton v-if="link.iframe === undefined" @click.prevent="addIframe(key)" class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">
                                + Add video iframe
                            </PrimaryButton>
                            <PrimaryButton @click.prevent="addHighlight(key)" class="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">
                                + Add video highlight
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
            <PrimaryButton @click.prevent="addLink()" class="ml-4 px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300">
                + Add resource link
            </PrimaryButton>
        </form>
    </div>
</template>