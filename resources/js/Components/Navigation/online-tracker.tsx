import { type ReactElement } from 'react'
import { Link, usePage } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

const navigation = [
  { label: 'Tracker Home', href: '#', components: ['Dashboard'] },
  { label: 'My Account', href: '#', components: [] },
  { label: 'Groups', href: '#', components: [] },
  { label: 'Reports', href: '#', components: [] },
  { label: 'Stars', href: '#', components: [] }
]

export default function OnlineTrackerNavigation (): ReactElement {
  const currentComponent = usePage().component

  return (
    <nav className="flex items-center py-2 px-12 gap-x-8 bg-[#2ec4b6] text-neutral-50">
      {navigation.map((item, index) => (
        <Link key={index} href={item.href} className={classNames(item.components.includes(currentComponent) ? 'bg-[#149f8e]' : '', 'p-2 rounded-full hover:bg-[#ff9f1c]')}>
          {item.label}
        </Link>
      ))}
      <div className="ml-auto flex items-center">
        <Link href={route('logout')} method="post" as="button" className="p-2 rounded-full hover:bg-[#ff9f1c]">
          Logout
        </Link>
      </div>
    </nav>
  )
}
