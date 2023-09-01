import { type ButtonHTMLAttributes, type ReactElement } from 'react'

export default function PrimaryButton ({
   className = '',
   disabled,
   children,
   ...props
}: ButtonHTMLAttributes<HTMLButtonElement>): ReactElement {
    return (
        <button
            {...props}
            className={
                `inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40 sm:w-auto transition ease-in-out duration-150 ${
                    disabled && 'opacity-25'
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    )
}
