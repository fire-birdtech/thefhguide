import {Fragment, type ReactElement} from "react";
import {Menu, Transition} from "@headlessui/react";
import {BellIcon} from "@heroicons/react/24/outline";
import {usePage} from "@inertiajs/react";
import {InboxIcon} from "@heroicons/react/24/solid";
import NotificationDropdownItem from "@/Components/Dropdowns/NotificationDropdownItem";

export default function NotificationDropdown(): ReactElement {
  const { notifications } = usePage().props;

  return (
    <Menu as="div" className="relative inline-block text-left">
      <div>
        <Menu.Button className="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <span className="sr-only">View Notifications</span>
          <BellIcon className="h-6 w-6" aria-hidden="true"/>
          {notifications.filter(n => n.read_at === null).length ? (
            <span className="absolute top-0 right-0 block h-2 w-2 rounded-full bg-blue-400 ring-2 ring-white"/>
          ) : null}
        </Menu.Button>
      </div>

      <Transition
        as={Fragment}
        enter="transition ease-out duration-100"
        enterFrom="transform opacity-0 scale-95"
        enterTo="transform opacity-100 scale-100"
        leave="transition ease-in duration-75"
        leaveFrom="transform opacity-100 scale-100"
        leaveTo="transform opacity-0 scale-95"
      >
        <Menu.Items className="absolute -right-4 z-10 mt-2 w-72 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          {notifications.length ? (
            <div className="py-1">
              {notifications.map((notification) => (
                <NotificationDropdownItem
                  key={notification.id}
                  notification={notification}
                />
              ))}
            </div>
          ) : (
            <div className="text-center px-4 py-6">
              <InboxIcon className="mx-auto h-12 w-12 text-blue-200"/>
              <p className="mt-2 text-sm font-medium text-gray-900">
                No notifications yet
              </p>
              <p className="mt-1 text-sm text-gray-500">
                We&apos;ll let you know when you have some.
              </p>
            </div>
          )}
        </Menu.Items>
      </Transition>
    </Menu>
  );
}
