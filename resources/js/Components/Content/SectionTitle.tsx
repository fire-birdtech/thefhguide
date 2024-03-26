import { type ReactElement } from 'react'

export default function SectionTitle ({ title }: { title: string }): ReactElement {
  return (
      <h2>
        {title}
      </h2>
  )
}
