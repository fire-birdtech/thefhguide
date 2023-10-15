import { type HTMLAttributes, type ReactElement } from 'react'

export default function InputError ({
  message,
  className = '',
  ...props
}: HTMLAttributes<HTMLParagraphElement> & {
  message?: string
}): ReactElement | null {
  return message !== undefined ? (
    <p {...props} className={`text-sm text-red-400 ${className}`}>
      {message}
    </p>
  ) : null
}
