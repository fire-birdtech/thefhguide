import {ButtonHTMLAttributes} from "react";

export default function ({ children, type = 'button', ...props }: ButtonHTMLAttributes<HTMLButtonElement>) {
  return (
    <button {...props} type={type} className="font-medium text-blue-600 hover:text-blue-500">
      {children}
    </button>
  );
}
