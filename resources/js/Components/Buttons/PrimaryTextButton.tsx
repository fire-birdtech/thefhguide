import { type ButtonHTMLAttributes, type ReactElement } from 'react'

export default function PrimaryTextButton ({ children, type = 'button', ...props }: ButtonHTMLAttributes<HTMLButtonElement>): ReactElement {
  return (
    <button {...props} type={type} className="font-medium text-blue-600 hover:text-blue-500">
      {children}
    </button>
  )
}
