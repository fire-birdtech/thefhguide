import { type PropsWithChildren, type ReactElement, type ReactNode } from 'react'
import { type User } from '@/types'
import MainNavigation from '@/Components/Navigation/Main'

export default function PageLayout ({ header, children }: PropsWithChildren<{
  header?: ReactNode
}>): ReactElement {
  return (
    <div className="min-h-screen">
      <MainNavigation />
      {header !== null && header}

      <main>{children}</main>
    </div>
  )
}
