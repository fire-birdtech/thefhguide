import { type ButtonHTMLAttributes, type ReactElement } from 'react'
import { Link } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

export default function PrimaryButtonFullWidth ({
  className = '',
  disabled,
  children,
  href,
  locked,
  type = 'submit',
  ...props
}: ButtonHTMLAttributes<HTMLButtonElement> & { href?: string, locked?: boolean }): ReactElement {
  const baseStyles: string = 'w-full flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 mb-1 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40'

  return href !== undefined ? (
    <Link
      href={href}
      className={classNames(
        baseStyles, className
      )}
    >
      {children}
    </Link>
  ) : (
    <button
      {...props}
      type={type}
      className={classNames(
        baseStyles, className
      )}
    >
      {children}
    </button>
  )
}
