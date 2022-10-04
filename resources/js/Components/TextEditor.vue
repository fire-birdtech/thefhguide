<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3';
import Link from '@tiptap/extension-link';
import StarterKit from '@tiptap/starter-kit';
import { unref } from 'vue';
import EditorButton from '@/Components/EditorButton';

const props = defineProps({
    modelValue: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(['update:modelValue']);

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        Link,
        StarterKit,
    ],
    onUpdate: ({editor}) => {
        const unrefEditor = unref(editor);
        emit("update:modelValue", unrefEditor.getHTML());
    },
    editorProps: {
        attributes: {
            class: 'prose prose-sm max-w-3xl mx-auto prose-a:text-blue-500 text-sm px-3 py-6 min-h-44 border-gray-300 rounded-bl-md rounded-br-md overflow-auto focus:outline-none',
        },
    },
});

const setLink = () => {
    const url = window.prompt('URL');

    if (url === null) {
        return;
    }

    if (url === '') {
        editor.chain().focus().extendMarkRange('link').unsetLink().run();

        return;
    }

    editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
}
</script>

<template>
    <div class="border border-gray-300 divide-y divide-gray-300 rounded-md">
        <div class="p-2 space-x-1" v-if="editor">
            <EditorButton @click="editor.chain().focus().toggleBold().run()" :active="editor.isActive('bold')">
                bold
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleItalic().run()" :active="editor.isActive('italic')">
                italic
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleParagraph().run()" :active="editor.isActive('paragraph')">
                paragraph
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :active="editor.isActive('heading', { level: 2 })">
                h2
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :active="editor.isActive('heading', { level: 3 })">
                h3
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :active="editor.isActive('heading', { level: 4 })">
                h4
            </EditorButton>
            <EditorButton @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
                ordered list
            </EditorButton>
            <EditorButton @click="setLink" :active="editor.isActive('link')">
                set link
            </EditorButton>
            <EditorButton @click="editor.chain().focus().unsetLink().run()" :not-active="editor.isActive('link')">
                unset link
            </EditorButton>
        </div>
        <EditorContent class="focus:ring focus:ring-blue-200 focus:ring-opacity-50 focus:outline-none" :editor="editor" />
    </div>
</template>