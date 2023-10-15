import { type ReactElement } from 'react'

export default function Prose ({ html }: { html: string }): ReactElement {
  return <div className="prose prose-sm" dangerouslySetInnerHTML={{ __html: html }}/>
}
