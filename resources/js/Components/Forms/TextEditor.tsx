import { type ReactElement } from 'react'
import { useEditor, EditorContent } from '@tiptap/react'
import StarterKit from '@tiptap/starter-kit'
import classNames from '@/Utils/classNames'

const extensions = [StarterKit]

export default function TextEditor ({ update, value, className = '' }: { className?: string, update: (html: string) => void, value: string }): ReactElement {
  const editor = useEditor({
    extensions,
    content: value,
    onUpdate ({ editor }): void {
      update(editor.getHTML())
    },
    editorProps: {
      attributes: {
        class: classNames(
          className,
          'prose prose-sm max-w-6xl border border-gray-300 prose-a:text-blue-500 rounded-md shadow-sm text-sm p-3.5 min-h-16 overflow-auto focus:outline-none focus-within:border-blue-300 focus-within:ring focus-within:ring-blue-200 focus-within:ring-opacity-50'
        )
      }
    }
  })
  return (
    <>
      <EditorContent spellCheck={false} editor={editor}/>
      {/* <FloatingMenu editor={editor} className="border border-gray-300 rounded-md p-1 shadow">This is a floating menu</FloatingMenu> */}
      {/* <BubbleMenu editor={editor}>This is a bubble menu</BubbleMenu> */}
    </>
  )
}
