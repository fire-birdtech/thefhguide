import {
  type TextareaHTMLAttributes, forwardRef, useEffect, useImperativeHandle, useRef
} from 'react'

const TextArea = forwardRef((
  { className = '', isFocused = false, ...props }: TextareaHTMLAttributes<HTMLTextAreaElement> & { isFocused?: boolean },
  ref
) => {
  const localRef = useRef<HTMLTextAreaElement>(null)

  useImperativeHandle(ref, () => ({
    focus: () => localRef.current?.focus()
  }))

  useEffect(() => {
    if (isFocused) {
      localRef.current?.focus()
    }
  }, [])

  return (
    <textarea
      {...props}
      className={
        'border-gray-300 text-gray-900 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200 ' +
        className
      }
      rows={4}
      ref={localRef}
    ></textarea>
  )
})

TextArea.displayName = 'TextArea'

export default TextArea
