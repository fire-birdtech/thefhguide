import { type PropsWithChildren, type ReactElement } from 'react'
import classNames from '@/Utils/classNames'

export default function EditorButton ({ children, className, onClick }: PropsWithChildren<{ className: string, onClick: () => void }>): ReactElement {
  return (
    <button type="button" onClick={onClick} className={classNames(
      'w-8 h-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none',
      className
    )}>
      {children}
    </button>
  )
}
