import classNames from "@/Utils/classNames";

interface InputLabelProps {
  label: string
  className?: string
  optional?: boolean
}

export default function InputLabel({label, className = '', optional = false}: InputLabelProps) {
  return (
    <label className={classNames(
      className,
      'block font-medium text-sm text-gray-700'
    )}>
      {label}
      {optional ? (
        <span className="mt-2 block text-xs font-medium uppercase text-gray-500">
            Optional
        </span>
      ) : null}
    </label>
  );
}
