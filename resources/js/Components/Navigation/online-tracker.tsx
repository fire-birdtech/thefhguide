import { type ComponentPropsWithoutRef, type ForwardedRef, type ReactElement, forwardRef } from 'react'
import { usePage } from '@inertiajs/react'
import { Link } from '@/Components/link'
import * as Headless from '@headlessui/react'
import { Link as InertiaLink, type InertiaLinkProps } from '@inertiajs/react'
import clsx from 'clsx'

interface Navigation {
  label?: string
  href: string
  components?: string[]
  order?: number
  id?: number
}

interface Props {
  additionalNav?: Navigation[]
}

const primaryNav: Navigation[] = [
  { label: 'Tracker Home', href: route('dashboard'), components: ['Dashboard'] },
  { label: 'My Account', href: route('settings.profile'), components: ['Settings/Account', 'Settings/Profile', 'Settings/Security'] },
  { label: 'Groups', href: route('groups'), components: ['Groups/Index', 'Groups/Show'] },
  { label: 'Reports', href: '#', components: [] },
  { label: 'Stars', href: '#', components: [] }
]

const NavItem = forwardRef(function NavItem (
  props: InertiaLinkProps & ComponentPropsWithoutRef<'a'> & Navigation,
  ref: ForwardedRef<HTMLAnchorElement>
) {
  const { component: currentComponent, url } = usePage()
  const { components, id, order, label } = props

  return (
    <Headless.DataInteractive>
      <InertiaLink
        {...props}
        className={clsx(
          props.className,
          (components !== undefined && components.includes(currentComponent)) ||
          (id !== undefined && url.endsWith(`/project/${id}`))
            ? 'bg-[#149f8e]'
            : '',
          'flex items-center p-2 rounded-full hover:bg-[#ff9f1c]'
        )}
        ref={ref}
      >
        {order !== undefined && (
          <span className="bg-white rounded-full w-6 h-6 text-sm text-[#2ec4b6] text-center flex items-center justify-center mr-1.5">
            {order}
          </span>
        )}
        {label}
      </InertiaLink>
    </Headless.DataInteractive>
  )
})

export default function OnlineTrackerNavigation ({ additionalNav = [] }: Props): ReactElement {
  const navigation = [...primaryNav, ...additionalNav]

  return (
    <nav className="flex items-center flex-wrap py-2 px-12 gap-x-8 bg-[#2ec4b6] text-neutral-50">
      {navigation.map((item, index) => (
        <NavItem key={item.id} {...item} />
      ))}
      <div className="ml-auto flex items-center">
        <NavItem href={route('logout')} method="post" as="button" label="Logout" />
      </div>
    </nav>
  )
}
