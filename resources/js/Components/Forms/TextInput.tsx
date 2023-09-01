import {forwardRef, useEffect, useImperativeHandle, useRef, type HTMLAttributes, type InputHTMLAttributes, type LabelHTMLAttributes} from 'react';

export default forwardRef(function TextInput(
  {type = 'text', className = '', isFocused = false, label, message, optional = false, ...props}: InputHTMLAttributes<HTMLInputElement> & LabelHTMLAttributes<HTMLLabelElement> & HTMLAttributes<HTMLParagraphElement> & {
    isFocused?: boolean, message: string, label?: string
  },
  ref
) {
  const localRef = useRef<HTMLInputElement>(null);

  useImperativeHandle(ref, () => ({
    focus: () => localRef.current?.focus()
  }));

  useEffect(() => {
    if (isFocused) {
      localRef.current?.focus()
    }
  }, []);

  return (
    <div>
      <label className="block font-medium text-sm text-gray-700">
        {label}
        {optional ? (
          <span className="mt-2 block text-xs font-medium uppercase text-gray-500">
            Optional
          </span>
        ) : null}
      </label>

      <input
        {...props}
        type={type}
        className={
          `mt-1 border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm ${className}`
        }
        ref={localRef}
      />

      {message !== null ? (
        <p className="mt-1 text-sm text-red-600">
          {message}
        </p>
      ) : null}
    </div>
  );
}
)
;
