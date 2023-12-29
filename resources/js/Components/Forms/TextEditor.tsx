import {type ReactElement, useState, Fragment, useCallback} from 'react'
import {useEditor, EditorContent, BubbleMenu} from '@tiptap/react'
import StarterKit from '@tiptap/starter-kit'
import Link from '@tiptap/extension-link'
import classNames from '@/Utils/classNames'
import EditorButton from "@/Components/Buttons/EditorButton";
import AddLinkModal from "@/Components/Modals/AddLink";
import {Menu, Transition} from "@headlessui/react";

const extensions = [StarterKit, Link.configure({openOnClick: false})]

export default function TextEditor ({ update, value, className = '' }: { className?: string, update: (html: string) => void, value: string }): ReactElement {
  const [addLink, setAddLink] = useState<boolean>(false)
  const [selectedHref, setSelectedHref] = useState<string|undefined>()

  const onClose = () => {
    setAddLink(false)
  }

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

  const onAddLink = (link: string) => {
    editor?.chain().focus().extendMarkRange('link').setLink({ href: link }).run()
    onClose()
  }

  const onEditLink = useCallback(() => {
    const previousUrl = editor?.getAttributes('link').href
    if (previousUrl) {
      setSelectedHref(previousUrl)
    }

    setAddLink(true)
  }, [editor])

  return (
    <>
      <EditorContent spellCheck={false} editor={editor}/>
      {/* <FloatingMenu editor={editor} className="border border-gray-300 rounded-md p-1 shadow">This is a floating menu</FloatingMenu> */}
      {editor && <BubbleMenu className="bg-white p-1 rounded-md shadow-lg ring-1 ring-black ring-opacity-5" editor={editor} tippyOptions={{ duration: 100, zIndex: 10 }}>
        <EditorButton
          onClick={() => editor.chain().focus().toggleBold().run()}
          className={editor.isActive('bold') ? 'is-active' : ''}
        >
          <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg>
        </EditorButton>
        <EditorButton
          onClick={() => editor.chain().focus().toggleItalic().run()}
          className={editor.isActive('italic') ? 'is-active' : ''}
        >
          <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="19" x2="10" y1="4" y2="4"/><line x1="14" x2="5" y1="20" y2="20"/><line x1="15" x2="9" y1="4" y2="20"/></svg>
        </EditorButton>
        <EditorButton
          onClick={() => onEditLink()}
          className={editor.isActive('link') ? 'is-active' : ''}
        >
          <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
        </EditorButton>
        <EditorButton
          onClick={() => editor.chain().focus().toggleOrderedList().run()}
          className={editor.isActive('orderedList') ? 'is-active' : ''}
        >
          <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="10" x2="21" y1="6" y2="6"/><line x1="10" x2="21" y1="12" y2="12"/><line x1="10" x2="21" y1="18" y2="18"/><path d="M4 6h1v4"/><path d="M4 10h2"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"/></svg>
        </EditorButton>
        <EditorButton
          onClick={() => editor.chain().focus().toggleBulletList().run()}
          className={editor.isActive('bulletList') ? 'is-active' : ''}
        >
          <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg>
        </EditorButton>
          <Menu as="div" className="relative inline-block text-left">
            <div>
              <Menu.Button>
                <EditorButton className="" onClick={() => {}}>
                  <svg className="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path d="M7 12h10"/><path d="M7 5v14"/><path d="M17 5v14"/><path d="M15 19h4"/><path d="M15 5h4"/><path d="M5 19h4"/><path d="M5 5h4"/></svg>
                </EditorButton>
              </Menu.Button>

              <Transition
                as={Fragment}
                enter="transition ease-out duration-100"
                enterFrom="transform opacity-0 scale-95"
                enterTo="transform opacity-100 scale-100"
                leave="transition ease-in duration-75"
                leaveFrom="transform opacity-100 scale-100"
                leaveTo="transform opacity-0 scale-95"
              >
                <Menu.Items className="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <div className="py-1">
                    <Menu.Item>
                      {({ active }) => (
                        <button
                          type="button"
                          onClick={() => editor.chain().focus().toggleHeading({ level: 2 }).run()}
                          className={classNames(
                            active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                            'w-full block px-4 py-2 text-sm text-left'
                          )}
                        >
                          Heading 2
                        </button>
                      )}
                    </Menu.Item>
                    <Menu.Item>
                      {({ active }) => (
                        <button
                          type="button"
                          onClick={() => editor.chain().focus().toggleHeading({ level: 3 }).run()}
                          className={classNames(
                            active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                            'w-full block px-4 py-2 text-sm text-left'
                          )}
                        >
                          Heading 3
                        </button>
                      )}
                    </Menu.Item>
                    <Menu.Item>
                      {({ active }) => (
                        <button
                          type="button"
                          onClick={() => editor.chain().focus().toggleHeading({ level: 4 }).run()}
                          className={classNames(
                            active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                            'w-full block px-4 py-2 text-sm text-left'
                          )}
                        >
                          Heading 4
                        </button>
                      )}
                    </Menu.Item>
                  </div>
                </Menu.Items>
              </Transition>
            </div>
          </Menu>
      </BubbleMenu>}

      <AddLinkModal
        add={(value: string) => onAddLink(value)}
        close={onClose}
        open={addLink}
        previousHref={selectedHref}
      />
    </>
  )
}
