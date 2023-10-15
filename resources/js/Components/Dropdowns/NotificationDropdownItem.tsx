import { type ReactElement } from 'react'
import { Menu } from '@headlessui/react'
import { Link } from '@inertiajs/react'
import classNames from '@/Utils/classNames'
import moment from 'moment'
import { type AppNotification } from '@/types'

export default function NotificationDropdownItem ({ notification }: { notification: AppNotification }): ReactElement {
  const readableDate: string = moment(notification.updated_at).fromNow()

  return (
    <Menu.Item>
      {({ active }) => (
        <Link
          href={route('notifications.read', notification.id)}
          className={classNames(
            active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
            notification.read_at === null ? 'font-bold' : 'font-normal',
            'flex flex-col w-full px-4 py-2 text-xs'
          )}
        >
          {notification.data.message}
          <span className="mt-1 text-gray-400">
            {readableDate}
          </span>
        </Link>
      )}
    </Menu.Item>
  )
}
