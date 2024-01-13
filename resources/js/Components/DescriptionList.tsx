import {type PropsWithChildren, type ReactElement, ReactNode} from 'react'
import classNames from '@/Utils/classNames'

type DescriptionListItemProps = {
  term: string,
  children?: ReactElement,
  className?: string,
  details?: string | ReactNode
}

export function DescriptionList({ children }: PropsWithChildren): ReactElement {
  return <dl className="sm:divide-y sm:divide-gray-200">{children}</dl>
}

export function DescriptionListItem({ term, children, className, details }: DescriptionListItemProps): ReactElement {
  return (
    <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
      <dt className="text-sm font-medium text-gray-500">
        {term}
      </dt>
      <dd className={classNames(className, 'mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7')}>
        {details ?? children}
      </dd>
    </div>
  )
}
