import {type ButtonHTMLAttributes, type ReactElement} from 'react'
import {InertiaLinkProps, Link} from "@inertiajs/react";
import classNames from "@/Utils/classNames";

export default function PrimaryButton({
  className = '',
  disabled,
  children,
  href,
  locked,
  type = 'button',
  ...props
}: ButtonHTMLAttributes<HTMLButtonElement> & { href?: string, locked?: boolean }): ReactElement {
  const baseStyles = "relative inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40 sm:w-auto transition ease-in-out duration-150";
  return href ? (
      <Link
        href={href}
        className={classNames(
          baseStyles,
          className,
          locked ? 'pointer-events-none cursor-not-allowed' : '',
          disabled ? 'opacity-25' : ''
        )}
        disabled={disabled}
      >
        {children}
      </Link>
    ) : (
    <button
      {...props}
      className={classNames(
        baseStyles,
        className,
        disabled ? 'opacity-25' : ''
      )}
      disabled={disabled}
    >
      {children}
    </button>
  )
}
