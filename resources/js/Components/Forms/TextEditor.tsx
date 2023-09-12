import {FormEventHandler, type ReactElement} from "react";
import {FloatingMenu, BubbleMenu, useEditor, EditorContent} from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';

const extensions = [StarterKit];

export default function ({update, value}: { index: number, update: (html: string) => {}, value: string }): ReactElement {
  const editor = useEditor({
    extensions,
    content: value,
    onUpdate({ editor }): void {
      update(editor.getHTML())
    },
    editorProps: {
      attributes: {
        class: 'prose prose-sm max-w-6xl prose-a:text-blue-500 text-sm p-4 min-h-32 border-gray-300 overflow-auto focus:outline-none',
      },
    },
  });
  return (
    <>
      <EditorContent spellCheck={false} editor={editor}/>
      <FloatingMenu editor={editor}>This is a floating menu</FloatingMenu>
      <BubbleMenu editor={editor}>This is a bubble menu</BubbleMenu>
    </>
  );
}
