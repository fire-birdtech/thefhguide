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
          'prose prose-sm max-w-6xl prose-a:text-blue-500 text-sm p-3.5 min-h-32 overflow-auto focus:outline-none'
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
