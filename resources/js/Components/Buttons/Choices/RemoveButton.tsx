import { type ButtonHTMLAttributes, type ReactElement } from 'react'
import { XMarkIcon } from '@heroicons/react/24/solid'

export default function RemoveButton ({ ...props }: ButtonHTMLAttributes<HTMLButtonElement>): ReactElement {
  return (
    <button
      {...props}
      type="button"
      className="rounded hover:bg-purple-100"
    >
      <XMarkIcon className="w-5 h-5 text-purple-700"/>
    </button>
  )
}
