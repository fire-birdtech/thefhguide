import {ButtonHTMLAttributes, ReactElement} from "react";
import {Link} from "@inertiajs/react";
import {LockClosedIcon} from "@heroicons/react/24/solid";
import classNames from "@/Utils/classNames";

export default function SecondaryButton({
    className = '',
    disabled,
    children,
    href = '',
    locked,
    ...props
}: ButtonHTMLAttributes<HTMLButtonElement> & { href?: string, locked?: boolean }): ReactElement {
    const baseStyles = `relative inline-flex bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto ${className}`
    return href ? (
        <Link
            href={href}
            className={classNames(
                locked ? 'pointer-events-none cursor-default' : '',
                baseStyles
            )}
        >
            {locked ? (
                <div className="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-200 opacity-70 z-40">
                    <LockClosedIcon className="h-4 w-4 opacity-80" aria-hidden="true"/>
                </div>
            ) : null}
            <div className="relative">
                {children}
            </div>
        </Link>
    ) : (
        <button
            {...props}
            className={classNames(
                locked ? 'pointer-events-none cursor-default' : '',
                baseStyles
            )}
            disabled={disabled}
        >
            {locked ? (
                <div className="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-200 opacity-70 z-40">
                    <LockClosedIcon className="h-4 w-4 opacity-80" aria-hidden="true"/>
                </div>
            ) : null}
            <div className="relative">
                {children}
            </div>
        </button>
    )
}
