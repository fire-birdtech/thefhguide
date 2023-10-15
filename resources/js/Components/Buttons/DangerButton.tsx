import { type ButtonHTMLAttributes, type ReactElement } from 'react'
import classNames from '@/Utils/classNames'

export default function DangerButton ({
  className = '',
  disabled,
  children,
  ...props
}: ButtonHTMLAttributes<HTMLButtonElement>): ReactElement {
  return (
    <button
      {...props}
      className={classNames(
        className,
        disabled === true ? 'opacity-25' : '',
        'inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:ring focus:ring-red-500 focus:ring-opacity-40 sm:w-auto transition ease-in-out duration-150'
      )}
      disabled={disabled}
    >
      {children}
    </button>
  )
}
