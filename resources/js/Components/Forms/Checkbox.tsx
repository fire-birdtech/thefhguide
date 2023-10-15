import { type InputHTMLAttributes, type ReactElement } from 'react'
import classNames from '@/Utils/classNames'

export default function Checkbox ({ className = '', ...props }: InputHTMLAttributes<HTMLInputElement>): ReactElement {
  return (
    <input
      {...props}
      type="checkbox"
      className={classNames(
        className,
        'rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'
      )}
    />
  )
}
