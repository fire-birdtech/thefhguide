import {type ButtonHTMLAttributes, type ReactElement} from "react";
import classNames from "@/Utils/classNames";
import {textStyles, bgStyles, bgHoverStyles, ringFocusStyles} from "@/Utils/choiceContentStyling";

export default function AddContentButton({
  value,
  disabled,
  color,
  type = 'button',
  ...props
}: ButtonHTMLAttributes<HTMLButtonElement & { color: string }>): ReactElement {
  return (
    <button
      {...props}
      type={type}
      disabled={disabled}
      className={classNames(
        textStyles[color],
        bgStyles[color],
        bgHoverStyles[color],
        ringFocusStyles[color],
        'inline-flex items-center rounded-full border border-transparent px-3 py-1.5 text-xs font-medium shadow-sm focus:ring focus:ring-opacity-40'
      )}
    >
      {value}
    </button>
  );
}
