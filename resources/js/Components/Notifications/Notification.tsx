import { Fragment, type ReactElement, useEffect, useState } from 'react'
import { Transition } from '@headlessui/react'
import { Link, usePage } from '@inertiajs/react'
import { CheckCircleIcon, XCircleIcon, XMarkIcon } from '@heroicons/react/24/solid'

export default function Notification (): ReactElement | null {
  const [showNotification, setShowNotification] = useState(true)
  let { notification } = usePage().props.flash

  useEffect(() => {
    const timer = setTimeout(() => {
      notification = null
      setShowNotification(false)
    }, 5000)
    return () => { clearTimeout(timer) }
  }, [])

  return showNotification && notification !== null ? (
    <div aria-live="assertive" className="pointer-events-none fixed inset-0 flex items-end px-6 py-6 sm:items-start sm:p-6">
      <div className="flex w-full flex-col items-center space-y-4 sm:items-end">
        <Transition
          show={showNotification && notification !== null}
          as={Fragment}
          enter="transform ease-out duration-300 transition"
          enterFrom="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
          enterTo="translate-y-0 opacity-100 sm:translate-x-0"
          leave="transition ease-in duration-100"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div className="p-4">
              <div className="flex items-start">
                <div className="flex-shrink-0">
                  {notification?.type === 'error' && <XCircleIcon className="h-6 w-6 text-red-400" aria-hidden="true"/>}
                  {notification?.type === 'success' && <CheckCircleIcon className="h-6 w-6 text-green-400" aria-hidden="true"/>}
                </div>
                <div className="ml-3 w-0 flex-1 pt-0.5">
                  <p className="text-sm font-medium text-gray-900">
                    {notification?.title}
                  </p>
                  <p className="mt-1 text-sm text-gray-500">
                    {notification?.message}
                  </p>
                  {notification?.actions !== false && (
                    <div className="mt-3 flex space-x-7">
                      {notification?.actions.view !== undefined && (
                        <Link
                          href={notification?.actions.view.href}
                          className="rounded-md bg-white text-sm text-blue-400 hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                          View
                        </Link>
                      )}
                    </div>
                  )}
                </div>
                <div className="ml-4 flex flex-shrink-0">
                  <button
                    type="button"
                    onClick={() => { setShowNotification(false) }}
                    className="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                  >
                    <span className="sr-only">Close</span>
                    <XMarkIcon className="h-5 w-5" aria-hidden="true"/>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </Transition>
      </div>
    </div>
  ) : null
}
