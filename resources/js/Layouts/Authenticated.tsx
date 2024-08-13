import { useState, type PropsWithChildren, type ReactNode, type ReactElement } from 'react'
import { Link } from '@inertiajs/react'
import ApplicationLogo from '@/Components/ApplicationLogo'
import Dropdown from '@/Components/Dropdown'
import NavLink from '@/Components/NavLink'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink'
import { type User } from '@/types'
import MainNavigation from "@/Components/Navigation/Main";

export default function Authenticated ({ user, header, children }: PropsWithChildren<{
  user: User
  header?: ReactNode
}>): ReactElement {
  const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false)

  return (
    <div className="min-h-screen bg-gray-100">
      <MainNavigation />

      <div className="pt-[3.75rem]">
        {header !== null && header}
      </div>

      <main>{children}</main>
    </div>
  )
}
