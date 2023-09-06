import {ReactElement} from "react";

export default function ({ children, type = 'button'}: ReactElement) {
  return (
    <button type={type} className="font-medium text-blue-600 hover:text-blue-500">
      {children}
    </button>
  );
}
