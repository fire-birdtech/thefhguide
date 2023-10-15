import { type ReactElement } from 'react'
import { Menu } from '@headlessui/react'
import {
  ArchiveBoxIcon,
  ArrowUpTrayIcon,
  BellAlertIcon,
  DocumentCheckIcon,
  PencilSquareIcon,
  PlusCircleIcon,
  UserMinusIcon,
  WindowIcon
} from '@heroicons/react/24/solid'
import { Link } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

export interface Action {
  icon: ReactElement
  name: string
  href: string
}

const menuItemStyles = (active: boolean): string => {
  return classNames(
    active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
    'group flex items-center px-4 py-2 text-sm'
  )
}

const iconStyles: string = 'mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500'

const icons = {
  ArchiveBoxIcon,
  ArrowUpTrayIcon,
  BellAlertIcon,
  DocumentCheckIcon,
  PencilSquareIcon,
  PlusCircleIcon,
  UserMinusIcon,
  WindowIcon
}

export function ExternalLinkMenuItem ({ action }: { action: Action }): ReactElement {
  const Icon = icons[action.icon]
  return (
    <Menu.Item>
      {({ active }) => (
        <a href={action.href} target="_blank" className={menuItemStyles(active)} rel="noreferrer">
          <Icon className={iconStyles} aria-hidden="true"/>
          {action.name}
        </a>
      )}
    </Menu.Item>
  )
}

export function InternalLinkMenuItem ({ action }: { action: Action }): ReactElement {
  const Icon = icons[action.icon]
  return (
    <Menu.Item>
      {({ active }) => (
        <Link href={action.href} className={menuItemStyles(active)}>
          <Icon className={iconStyles} aria-hidden="true"/>
          {action.name}
        </Link>
      )}
    </Menu.Item>
  )
}

export function ButtonMenuItem ({ action }: { action: Action }): ReactElement {
  const Icon = icons[action.icon]
  return (
    <Menu.Item>
      {({ active }) => (
        <button
          type="button"
          onClick={action.emit}
          disabled={action.disabled ?? false}
          className={classNames(
            menuItemStyles(active), 'w-full text-left disabled:pointer-events-none disabled:cursor-none'
          )}
        >
          <Icon className={iconStyles} aria-hidden="true"/>
          {action.name}
        </button>
      )}
    </Menu.Item>
  )
}
