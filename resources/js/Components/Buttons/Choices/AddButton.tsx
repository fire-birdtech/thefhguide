import {type ButtonHTMLAttributes, type ReactElement} from "react";

export default function AddButton({
  children,
  disabled,
  type = 'button',
  ...props
}: ButtonHTMLAttributes<HTMLButtonElement>): ReactElement {
  return (
    <button
      {...props}
      type={type}
      disabled={disabled}
      className="block px-2 py-1 text-xs rounded bg-purple-200 text-purple-700 disabled:cursor-default disabled:bg-opacity-50 disabled:text-opacity-50 hover:bg-purple-300"
    >
      {children}
    </button>
  );
}
