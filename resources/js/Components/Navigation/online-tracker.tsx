import { type ReactElement } from 'react'
import { Link, usePage } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

interface Navigation {
  label: string
  href: string
  components: string[]
  order?: number
  id?: number
}

interface Props {
  additionalNav?: Navigation[]
}

const primaryNav: Navigation[] = [
  { label: 'Tracker Home', href: route('dashboard'), components: ['Dashboard'] },
  { label: 'My Account', href: '#', components: [] },
  { label: 'Groups', href: route('groups'), components: ['Groups/Index'] },
  { label: 'Reports', href: '#', components: [] },
  { label: 'Stars', href: '#', components: [] }
]

export default function OnlineTrackerNavigation ({ additionalNav = [] }: Props): ReactElement {
  const { component: currentComponent, url } = usePage()

  const navigation = [...primaryNav, ...additionalNav]

  return (
    <nav className="flex items-center flex-wrap py-2 px-12 gap-x-8 bg-[#2ec4b6] text-neutral-50">
      {navigation.map((item, index) => (
        <Link key={index} href={item.href} className={classNames(
          item.components.includes(currentComponent) ||
          (item?.id !== undefined && url.endsWith(`/project/${item.id}`))
            ? 'bg-[#149f8e]'
            : '',
          'flex items-center p-2 rounded-full hover:bg-[#ff9f1c]'
        )}>
          {item.order !== undefined && (
            <span className="bg-white rounded-full w-6 h-6 text-sm text-[#2ec4b6] text-center flex items-center justify-center mr-1.5">
              {item.order}
            </span>
          )}
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
