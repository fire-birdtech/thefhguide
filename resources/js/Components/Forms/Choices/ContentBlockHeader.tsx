import { type ReactElement } from 'react'
import { XMarkIcon } from '@heroicons/react/24/solid'
import classNames from '@/Utils/classNames'
import { bgStyles, closeIconStyles, textStyles } from '@/Utils/choiceContentStyling'

export default function ContentBlockHeader ({ children, color, remove }: { children: string, color: string, remove: () => void }): ReactElement {
  return (
    <div className="block group">
      <span className={classNames(
        textStyles[color],
        bgStyles[color],
        'inline-flex items-center rounded-t px-2 py-0.5 text-xs leading-6 font-medium'
      )}>
        {children}
        <button
          type="button"
          onClick={remove}
          className={classNames(
            textStyles[color],
            closeIconStyles[color],
            'hidden ml-1.5 -mr-0.5 h-3.5 w-3.5 flex-shrink-0 items-center justify-center rounded group-hover:inline-flex focus:outline-none'
          )}
        >
          <span className="sr-only">Remove content block</span>
          <XMarkIcon className="h-3 w-3"/>
        </button>
      </span>
    </div>
  )
}
