import {Fragment, type ReactElement} from "react"
import {Dialog, Transition} from "@headlessui/react";
import {XMarkIcon} from "@heroicons/react/24/solid";
import {ContentElementType} from "@/enums";

export default function AddContentElementModal ({ add, open, close }: {
  add: (key: ContentElementType) => void,
  open: boolean,
  close: () => void,
}): ReactElement {
  const handleClick = (key: ContentElementType) => {
    add(key)
    close()
  }
  return (
    <Transition.Root show={open} as={Fragment}>
      <Dialog as="div" className="relative z-10" onClose={close}>
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
          <div className="flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enterTo="opacity-100 translate-y-0 sm:scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 translate-y-0 sm:scale-100"
              leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
              <Dialog.Panel className="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all divide-y divide-gray-200 sm:my-8 sm:w-full sm:max-w-4xl">
                <div className="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                  <button
                    type="button"
                    className="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    onClick={close}
                  >
                    <span className="sr-only">Close</span>
                    <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                  </button>
                </div>
                <Dialog.Title
                  as="h3"
                  className="text-lg font-medium leading-6 text-gray-900 p-4 sm:px-6"
                >
                  Select an element
                </Dialog.Title>
                <Dialog.Description className="p-4">
                  <div className="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                    <button onClick={() => handleClick(ContentElementType.TITLE)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15"></path>
                              <path d="M4,3 L12,3 C12.5522847,3 13,3.44771525 13,4 C13,4.55228475 12.5522847,5 12,5 L4,5 C3.44771525,5 3,4.55228475 3,4 C3,3.44771525 3.44771525,3 4,3 Z" id="Path-19" stroke="#2563EB"></path>
                              <line x1="4" y1="8" x2="11" y2="8" id="Path-20" strokeLinecap="round"/>
                              <line x1="4" y1="10" x2="12" y2="10" id="Path-21" strokeLinecap="round"/>
                              <line x1="4" y1="12" x2="9" y2="12" strokeLinecap="round"/>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Title
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>

                    <button onClick={() => handleClick(ContentElementType.RIGHT_ALIGNED_IMAGE)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15"/>
                              <path d="M9,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,6 C12,6.55228475 11.5522847,7 11,7 L9,7 C8.44771525,7 8,6.55228475 8,6 L8,4 C8,3.44771525 8.44771525,3 9,3 Z" stroke="#2563EB"/>
                              <line x1="4" y1="3" x2="6" y2="3" strokeLinecap="round"/>
                              <line x1="4" y1="5" x2="6" y2="5" strokeLinecap="round"/>
                              <line x1="4" y1="7" x2="6" y2="7" strokeLinecap="round"/>
                              <line x1="4" y1="9" x2="12" y2="9" strokeLinecap="round"/>
                              <line x1="4" y1="11" x2="12" y2="11" strokeLinecap="round"/>
                              <line x1="4" y1="13" x2="10" y2="13" strokeLinecap="round"/>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Right-aligned Image
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>
                    <button onClick={() => handleClick(ContentElementType.TEXT)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15"/>
                              <line x1="4" y1="3" x2="12" y2="3" stroke="#2563EB" strokeLinecap="round"/>
                              <line x1="4" y1="5" x2="11" y2="5" stroke="#2563EB" strokeLinecap="round"/>
                              <line x1="4" y1="7" x2="9" y2="7" stroke="#2563EB" strokeLinecap="round"/>
                              <line x1="4" y1="10" x2="12" y2="10" stroke="#2563EB" strokeLinecap="round"/>
                              <line x1="4" y1="12" x2="12" y2="12" stroke="#2563EB" strokeLinecap="round"/>
                              <line x1="4" y1="14" x2="10" y2="14" stroke="#2563EB" strokeLinecap="round"/>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Text
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>
                    <button onClick={() => handleClick(ContentElementType.RESOURCE_LIST)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15"></path>
                              <line x1="4" y1="3" x2="12" y2="3" stroke="#2563EB" strokeLinecap="round"></line>
                              <path strokeWidth={0} d="M4.4394,4.5403875 C4.4618,4.4865375 4.5382,4.4865375 4.5606,4.5403875 L4.6647,4.7907375 L4.9349,4.8123875 C4.9931,4.8170375 5.0167,4.8896375 4.97235,4.9276375 L4.7665,5.1039875 L4.82935,5.3676375 C4.8429,5.4244375 4.78115,5.4692875 4.73135,5.4388875 L4.5,5.2975875 L4.26865,5.4388875 C4.21885,5.4692875 4.1571,5.4243875 4.17065,5.3676375 L4.2335,5.1039875 L4.02765,4.9276375 C3.9833,4.8896375 4.0069,4.8170375 4.0651,4.8123875 L4.3353,4.7907375 L4.4394,4.5404375 L4.4394,4.5403875 Z" fill="#2563EB" fillRule="nonzero"></path>
                              <line x1="6" y1="5" x2="11" y2="5" stroke="#2563EB" strokeLinecap="round"></line>
                              <line x1="4" y1="7.5" x2="10" y2="7.5" stroke="#2563EB" strokeLinecap="round"></line>
                              <path strokeWidth={0} d="M4.4394,9.0403875 C4.4618,8.9865375 4.5382,8.9865375 4.5606,9.0403875 L4.6647,9.2907375 L4.9349,9.3123875 C4.9931,9.3170375 5.0167,9.3896375 4.97235,9.4276375 L4.7665,9.6039875 L4.82935,9.8676375 C4.8429,9.9244375 4.78115,9.9692875 4.73135,9.9388875 L4.5,9.7975875 L4.26865,9.9388875 C4.21885,9.9692875 4.1571,9.9243875 4.17065,9.8676375 L4.2335,9.6039875 L4.02765,9.4276375 C3.9833,9.3896375 4.0069,9.3170375 4.0651,9.3123875 L4.3353,9.2907375 L4.4394,9.0404375 L4.4394,9.0403875 Z" fill="#2563EB" fillRule="nonzero"></path>
                              <line x1="6" y1="9.5" x2="11" y2="9.5" stroke="#2563EB" strokeLinecap="round"></line>
                              <line x1="4" y1="12" x2="10" y2="12" stroke="#2563EB" strokeLinecap="round"></line>
                              <path strokeWidth={0} d="M4.4394,13.5403875 C4.4618,13.4865375 4.5382,13.4865375 4.5606,13.5403875 L4.6647,13.7907375 L4.9349,13.8123875 C4.9931,13.8170375 5.0167,13.8896375 4.97235,13.9276375 L4.7665,14.1039875 L4.82935,14.3676375 C4.8429,14.4244375 4.78115,14.4692875 4.73135,14.4388875 L4.5,14.2975875 L4.26865,14.4388875 C4.21885,14.4692875 4.1571,14.4243875 4.17065,14.3676375 L4.2335,14.1039875 L4.02765,13.9276375 C3.9833,13.8896375 4.0069,13.8170375 4.0651,13.8123875 L4.3353,13.7907375 L4.4394,13.5404375 L4.4394,13.5403875 Z" fill="#2563EB" fillRule="nonzero"></path>
                              <line x1="6" y1="14" x2="11" y2="14" stroke="#2563EB" strokeLinecap="round"></line>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Resource List
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>
                    <button onClick={() => handleClick(ContentElementType.IMAGE_GRID)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15" id="Path-18"/>
                              <rect stroke="#2563EB" strokeWidth={0.5} x="4" y="3" width="3" height="3" rx="1"/>
                              <line x1="4.5" y1="7" x2="5.5" y2="7" strokeLinecap="round"/>
                              <rect stroke="#2563EB" strokeWidth={0.5} x="9" y="3" width="3" height="3" rx="1"/>
                              <line x1="9.5" y1="7" x2="10.5" y2="7" strokeLinecap="round"/>
                              <rect stroke="#2563EB" strokeWidth={0.5} x="4" y="9" width="3" height="3" rx="1"/>
                              <line x1="4.5" y1="13" x2="5.5" y2="13" strokeLinecap="round"/>
                              <rect stroke="#2563EB" strokeWidth={0.5} x="9" y="9" width="3" height="3" rx="1"/>
                              <line x1="9.5" y1="13" x2="10.5" y2="13" strokeLinecap="round"/>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Image Grid
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>
                    <button onClick={() => handleClick(ContentElementType.LEFT_ALIGNED_IMAGE)} className="bg-white p-4 transition duration-300 rounded-lg text-left hover:bg-gray-100">
                      <div className="flex">
                        <div className="mt-1.5 flex justify-center flex-shrink-0 rounded-s-xl">
                          <svg className="h-6 w-6 text-gray-500" width="16px" height="16px" viewBox="0 0 16 16">
                            <g stroke="currentColor" strokeWidth="1" fill="none" fillRule="evenodd">
                              <path d="M1,15 L1,2 C1,1.44771525 1.44771525,1 2,1 L14,1 C14.5522847,1 15,1.44771525 15,2 L15,15 L15,15"/>
                              <path d="M5,3 L7,3 C7.55228475,3 8,3.44771525 8,4 L8,6 C8,6.55228475 7.55228475,7 7,7 L5,7 C4.44771525,7 4,6.55228475 4,6 L4,4 C4,3.44771525 4.44771525,3 5,3 Z" stroke="#2563EB"/>
                              <line x1="4" y1="9" x2="12" y2="9" id="Path-22" strokeLinecap="round"/>
                              <line x1="4" y1="11" x2="12" y2="11" id="Path-22" strokeLinecap="round"/>
                              <line x1="4" y1="13" x2="10" y2="13" id="Path-22" strokeLinecap="round"/>
                              <line x1="10" y1="3" x2="12" y2="3" id="Path-20" strokeLinecap="round"/>
                              <line x1="10" y1="5" x2="12" y2="5" id="Path-21" strokeLinecap="round"/>
                              <line x1="10" y1="7" x2="12" y2="7" id="Path-22" strokeLinecap="round"/>
                            </g>
                          </svg>
                        </div>

                        <div className="grow ms-6">
                          <h3 className="text-sm font-semibold text-blue-600">
                            Left Aligned Image
                          </h3>
                          <p className="mt-1 text-sm text-gray-600">
                            A framework for building web user interfaces.
                          </p>
                        </div>
                      </div>
                    </button>
                  </div>
                </Dialog.Description>
              </Dialog.Panel>
            </Transition.Child>
          </div>
        </div>
      </Dialog>
    </Transition.Root>
  )
}
