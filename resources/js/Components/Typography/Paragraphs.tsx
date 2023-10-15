import { type PropsWithChildren, type ReactElement } from 'react'

export function Paragraph ({ children, className = '' }: PropsWithChildren<{ className: string }>): ReactElement {
  return (
    <p className={`text-sm text-gray-500 ${className}`}>
      {children}
    </p>
  )
}
