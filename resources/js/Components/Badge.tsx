import { type ReactElement } from 'react'
import classNames from '@/Utils/classNames'

export default function Badge ({ text, className = '' }: { text: string, className?: string }): ReactElement {
  return (
    <span
      className={classNames(className, 'inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800')}>
        {text.charAt(0).toUpperCase() + text.slice(1)}
    </span>
  )
}
