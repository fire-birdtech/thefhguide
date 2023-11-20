import { Fragment, type ReactElement } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { XMarkIcon } from '@heroicons/react/24/solid'
import {MediaFile} from "@/types"

export default function MediaDetailsModal ({ file, open, setOpen }: { file?: MediaFile, open: boolean, setOpen: () => void }): ReactElement {
  return (
    <Transition.Root show={open} as={Fragment}>
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
          <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </Transition.Child>

        <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center">
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enterTo="opacity-100 translate-y-0 sm:scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 translate-y-0 sm:scale-100"
              leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
              <Dialog.Panel className="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full sm:h-full sm:max-w-6xl sm:max-h-[56rem]">
                <div className="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                  <button
                    type="button"
                    className="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    onClick={() => { setOpen() }}
                  >
                    <span className="sr-only">Close</span>
                    <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                  </button>
                </div>
                <div className="grid grid-cols-6">
                  <div className="col-span-4 flex justify-center items-center bg-gray-900 h-auto w-auto">
                    <img src={file?.url} className="object-contain" alt=""/>
                  </div>
                  <div className="col-span-2 bg-white p-8 space-y-6">
                    <div>
                      <div className="flex items-start justify-between">
                        <div>
                          <h2 className="text-lg font-semibold text-gray-900">
                            <span className="sr-only">Details for </span>
                            {file?.name}
                          </h2>
                          <p className="text-sm font-medium text-gray-500">{file?.path.substring(6)}</p>
                        </div>
                      </div>
                    </div>
                    <div>
                      <h3 className="font-medium text-gray-900">Information</h3>
                      <dl className="mt-2 divide-y divide-gray-200 border-b border-t border-gray-200">
                        <div className="flex justify-between py-3 text-sm font-medium">
                          <dt className="text-gray-500">Uploaded By</dt>
                          <dd className="whitespace-nowrap text-gray-900">Marie Culver</dd>
                        </div>

                        <div className="flex justify-between py-3 text-sm font-medium">
                          <dt className="text-gray-500">Created</dt>
                          <dd className="whitespace-nowrap text-gray-900">{file?.created_at}</dd>
                        </div>

                        <div className="flex justify-between py-3 text-sm font-medium">
                          <dt className="text-gray-500">Last modified</dt>
                          <dd className="whitespace-nowrap text-gray-900">{file?.updated_at}</dd>
                        </div>
                      </dl>
                    </div>

                    <div>
                      <h3 className="font-medium text-gray-900">Usages</h3>
                      {file?.mediaable !== null ? (
                        <ul role="list" className="mt-2 divide-y divide-gray-200 border-y border-gray-200"></ul>
                      ) : (
                        <p className="mt-1 text-sm text-gray-500">No current usages</p>
                      )}
                    </div>
                  </div>
                </div>
              </Dialog.Panel>
            </Transition.Child>
          </div>
        </div>
      </Dialog>
    </Transition.Root>
  )
}
