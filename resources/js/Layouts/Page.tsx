import { type PropsWithChildren, type ReactElement, type ReactNode } from 'react'
import MainNavigation from '@/Components/Navigation/Main'
import SiteFooter from "@/Components/SiteFooter";

export default function PageLayout ({ header, children }: PropsWithChildren<{
  header?: ReactNode
}>): ReactElement {
  return (
    <div className="min-h-screen">
      <MainNavigation />
      {header !== null && header}

      <main>{children}</main>

      <SiteFooter />
    </div>
  )
}
