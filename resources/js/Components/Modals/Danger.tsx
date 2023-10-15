import { Fragment, type MouseEventHandler, type PropsWithChildren, type ReactElement } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { XMarkIcon, ExclamationTriangleIcon } from '@heroicons/react/24/solid'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'
import DangerButton from '@/Components/Buttons/DangerButton'
import classNames from '@/Utils/classNames'

export default function Danger ({
  children,
  destroy,
  open,
  setOpen,
  dangerButtonText = 'Delete',
  maxWidthClass = 'sm:max-w-lg'
}: PropsWithChildren<{
  destroy: MouseEventHandler
  open: boolean
  setOpen: (value: boolean) => void
  dangerButtonText?: string
  maxWidthClass?: string
}>): ReactElement {
  return (
    <Transition show={open} as={Fragment} leave="duration-200">
      <Dialog as="div" className="relative z-10" onClose={setOpen}>
        <Transition.Child
          as={Fragment}
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="fixed inset-0 bg-red-500 bg-opacity-75 transition-opacity"/>
        </Transition.Child>

        <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enterTo="opacity-100 translate-y-0 sm:scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 translate-y-0 sm:scale-100"
              leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
              <Dialog.Panel
                className={classNames(
                  'relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:p-6',
                  maxWidthClass
                )}>
                <div className="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                  <button
                    type="button"
                    className="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                    onClick={() => { setOpen(false) }}
                  >
                    <span className="sr-only">Close</span>
                    <XMarkIcon className="h-6 w-6" aria-hidden="true"/>
                  </button>
                </div>
                <div className="sm:flex sm:items-start">
                  <div
                    className="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <ExclamationTriangleIcon className="h-6 w-6 text-red-600"/>
                  </div>
                  <div className="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    {children}
                  </div>
                </div>
                <div className="mt-5 sm:flex sm:flex-row-reverse">
                  <DangerButton className="ml-3" onClick={destroy}>
                    {dangerButtonText}
                  </DangerButton>
                  <SecondaryButton className="mt-3 sm:mt-0" onClick={() => { setOpen(false) }}>
                    Cancel
                  </SecondaryButton>
                </div>
              </Dialog.Panel>
            </Transition.Child>
          </div>
        </div>
      </Dialog>
    </Transition>
  )
}
