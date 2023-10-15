import {
  forwardRef,
  type HTMLAttributes,
  type InputHTMLAttributes,
  type LabelHTMLAttributes,
  useEffect,
  useImperativeHandle,
  useRef
} from 'react'

export default forwardRef(function TextInput (
  { type = 'text', className = '', isFocused = false, ...props }: InputHTMLAttributes<HTMLInputElement> & LabelHTMLAttributes<HTMLLabelElement> & HTMLAttributes<HTMLParagraphElement> & {
    isFocused?: boolean
  },
  ref
) {
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
      className={
        `border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm ${className}`
      }
      ref={localRef}
    />
  )
})
