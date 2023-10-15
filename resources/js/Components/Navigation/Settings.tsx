import { type ReactElement } from 'react'
import { Cog8ToothIcon, LockClosedIcon, UserCircleIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

const navigation = [
  { name: 'Profile', href: route('settings.profile'), icon: UserCircleIcon, component: 'Settings/Profile' },
  { name: 'Account', href: route('settings.account'), icon: Cog8ToothIcon, component: 'Settings/Account' },
  { name: 'Security', href: route('settings.security'), icon: LockClosedIcon, component: 'Settings/Security' }
]

export default function Settings (): ReactElement {
  const { component } = usePage()
  return (
    <div className="hidden md:flex md:w-64 md:flex-col">
      <div className="flex flex-grow flex-col overflow-y-auto">
        <div className="flex flex-grow flex-col">
          <div className="flex-1 space-y-1 px-2 pb-4">
            {navigation.map((item) => (
              <Link
                href={item.href}
                key={item.name}
                className={classNames(
                  item.component === component
                    ? 'bg-gray-200 text-gray-900'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900',
                  'group flex items-center px-2 py-2 text-sm font-medium rounded-md'
                )}
              >
                <item.icon
                  aria-hidden={true}
                  className={classNames(
                    item.component === component
                      ? 'text-gray-500'
                      : 'text-gray-400 group-hover:text-gray-500',
                    'mr-3 flex-shrink-0 h-6 w-6'
                  )}
                />
                {item.name}
              </Link>
            ))}
          </div>
        </div>
      </div>
    </div>
  )
}
