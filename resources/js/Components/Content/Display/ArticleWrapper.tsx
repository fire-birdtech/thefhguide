import { type PropsWithChildren, type ReactElement } from 'react'
import Prose from '@/Components/Content/Display/prose'

export default function ArticleWrapper ({ children }: PropsWithChildren): ReactElement {
  return (
    <article className="pb-12">
      <Prose className="mx-auto max-w-body">
        <div className="divide-y divide-gray-300">
          {children}
        </div>
      </Prose>
    </article>
  )
}
