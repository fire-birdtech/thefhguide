import { Fragment, type ReactElement } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { XMarkIcon } from '@heroicons/react/24/solid'
import {type MediaFile} from "@/types"

export default function AddMediaModal ({
  files, open, close, errors, recentlySuccessful, onSubmit, clearErrors
}: {
  files: MediaFile[],
  open: boolean,
  close: () => void,
  errors: Partial<Record<"mediaableId" | "mediaableType", string>>,
  recentlySuccessful: boolean,
  onSubmit: (id: number) => void,
  clearErrors: () => void
}): ReactElement {
  const onClose = () => {
    close()
    if (clearErrors !== undefined) {
      clearErrors()
    }
  }

  return (
    <Transition.Root show={open} as={Fragment}>
      <Dialog as="div" className="relative z-10" onClose={onClose}>
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
              <Dialog.Panel className="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl sm:p-6">
                <div className="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                  <button
                    type="button"
                    className="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    onClick={onClose}
                  >
                    <span className="sr-only">Close</span>
                    <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                  </button>
                </div>
                <div>
                  <div className="flex items-center space-x-3">
                    <Dialog.Title as="h3" className="text-lg leading-6 font-medium text-gray-900">
                      Select Media
                    </Dialog.Title>
                    <Transition
                      show={errors?.mediaableId !== null}
                      enter="transition ease-in-out duration-150"
                      enterFrom="opacity-0"
                      leave="transition ease-in-out duration-150"
                      leaveTo="opacity-0"
                    >
                      <p className="text-sm text-red-600">
                        {errors?.mediaableId}
                      </p>
                    </Transition>
                    <Transition
                      show={recentlySuccessful}
                      enter="transition ease-in-out duration-150"
                      enterFrom="opacity-0"
                      leave="transition ease-in-out duration-150"
                      leaveTo="opacity-0"
                    >
                      <p className="text-sm text-green-600">
                        Image attached
                      </p>
                    </Transition>
                  </div>
                  <ul role="list" className="mt-6 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    {files.map((file) => (
                      <li key={file.id} className="relative">
                        <div className="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                          <img src={file.url} alt="" className="pointer-events-none object-cover group-hover:opacity-75" />
                          <button type="button" onClick={() => onSubmit(file.id)} className="absolute inset-0 focus:outline-none">
                            <span className="sr-only">View details for {file.name}</span>
                          </button>
                        </div>
                        <p className="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{file.name}</p>
                      </li>
                    ))}
                  </ul>
                </div>
              </Dialog.Panel>
            </Transition.Child>
          </div>
        </div>
      </Dialog>
    </Transition.Root>
  )
}
