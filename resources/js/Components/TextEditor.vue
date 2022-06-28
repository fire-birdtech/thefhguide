<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3';
import Link from '@tiptap/extension-link';
import StarterKit from '@tiptap/starter-kit';
import { toRef, unref, watch } from 'vue';
import EditorButton from '@/Components/EditorButton';

const props = defineProps({
    modelValue: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(['update:modelValue']);

// watch(toRef(props, "modelValue"), (value) => {
//     unref(editor);
//     if (editor.getHTML() === value) {
//         return;
//     }
//     editor.commandManager.setContent(value, false);
// });

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
            class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl text-sm p-3 h-44 border-gray-300 rounded-bl-md rounded-br-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 focus:outline-none',
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
            <EditorButton @click="setLink" :active="editor.isActive('link')">
                set link
            </EditorButton>
            <EditorButton @click="editor.chain().focus().unsetLink().run()" :not-active="editor.isActive('link')">
                unset link
            </EditorButton>
        </div>
        <EditorContent class="prose overflow-auto" :editor="editor" />
    </div>
</template>