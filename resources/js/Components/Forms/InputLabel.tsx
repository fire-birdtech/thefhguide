import { type ReactElement } from 'react'
import classNames from '@/Utils/classNames'

interface InputLabelProps {
  label: string
  className?: string
  optional?: boolean
}

export default function InputLabel ({ label, className = '', optional = false }: InputLabelProps): ReactElement {
  return (
    <label className={classNames(
      className,
      'flex items-center font-medium text-sm text-gray-700'
    )}>
      {label}
      {optional ? (
        <span className="ml-3 block text-xs font-medium uppercase text-gray-500">
            Optional
        </span>
      ) : null}
    </label>
  )
}
