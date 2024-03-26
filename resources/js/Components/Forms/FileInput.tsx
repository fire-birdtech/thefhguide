import {
  forwardRef, type HTMLAttributes,
  type InputHTMLAttributes,
  type LabelHTMLAttributes,
  type ReactElement,
  useEffect,
  useImperativeHandle,
  useRef
} from 'react'
import classNames from '@/Utils/classNames'

export default forwardRef(function FileInput (
  { type = 'file', className = '', isFocused = false, ...props }: InputHTMLAttributes<HTMLInputElement> & LabelHTMLAttributes<HTMLLabelElement> & HTMLAttributes<HTMLParagraphElement> & {
    isFocused?: boolean
  },
  ref
): ReactElement {
  const localRef = useRef<HTMLInputElement>(null)

  useImperativeHandle(ref, () => ({
    focus: () => localRef.current?.focus()
  }))

  useEffect(() => {
    if (isFocused) {
      localRef.current?.focus()
    }
  }, [])

  return (
    <input
      {...props}
      type={type}
      accept="image/*"
      className={classNames(
        'block w-full text-sm text-gray-500 focus:outline-none file:me-4 file:py-2 file:px-4 file:rounded-md file:border file:border-transparent file:text-sm file:font-medium file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer file:disabled:opacity-50 file:disabled:pointer-events-none',
        className
      )}
      ref={localRef}
    />
  )
})
