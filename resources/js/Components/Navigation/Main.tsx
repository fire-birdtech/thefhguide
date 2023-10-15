import {Fragment, ReactElement, useState} from "react";
import {Link, usePage} from "@inertiajs/react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import {Bars3Icon, XMarkIcon} from "@heroicons/react/24/outline";
import {Dialog, Disclosure, Popover, Transition} from "@headlessui/react";
import {ChevronDownIcon} from "@heroicons/react/24/solid";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import classNames from "@/Utils/classNames";

export default function MainNavigation (): ReactElement {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false)
  const { navigation } = usePage().props

  return (
    <header className="fixed inset-x-0 z-50 bg-white">
      <nav className="mx-auto flex items-center justify-between px-4 py-3 lg:px-8 lg:py-0" aria-label="Global">
        <div className="flex lg:flex-1">
          <Link href={route('home')} className="-m-1.5 p-1.5">
            <span className="sr-only">The Family History Guide</span>
            <ApplicationLogo className="h-8 w-auto"/>
          </Link>
        </div>
        <div className="flex lg:hidden">
          <button
            type="button"
            className="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
            onClick={() => setMobileMenuOpen(true)}
          >
            <span className="sr-only">Open main menu</span>
            <Bars3Icon className="h-6 w-6" aria-hidden="true" />
          </button>
        </div>
        <Popover.Group className="hidden lg:flex">
          {navigation.map((item: {name: string, menuItems: any[]}) => (
            <Popover className="relative">
              <Popover.Button className="inline-flex items-center gap-x-1 px-2 py-2.5 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-200">
                <span>{item.name}</span>
                <ChevronDownIcon className="h-3 w-3 stroke-gray-400" aria-hidden="true" />
              </Popover.Button>

              <Transition
                as={Fragment}
                enter="transition ease-out duration-200"
                enterFrom="opacity-0 translate-y-1"
                enterTo="opacity-100 translate-y-0"
                leave="transition ease-in duration-150"
                leaveFrom="opacity-100 translate-y-0"
                leaveTo="opacity-0 translate-y-1"
              >
                <Popover.Panel className="absolute left-1/2 z-10 mt-1 flex w-screen max-w-min -translate-x-1/2 px-4">
                  <div className="w-56 shrink rounded-xl bg-white py-3 text-sm font-semibold leading-6 text-gray-900 shadow-lg ring-1 ring-gray-900/5">
                    {item.menuItems.map((link: {name: string, link: string}, index: number) => (
                      <Link key={index} href={link.link} className="block px-5 py-2 hover:bg-gray-100">
                        {link.name}
                      </Link>
                    ))}
                  </div>
                </Popover.Panel>
              </Transition>
            </Popover>
          ))}
        </Popover.Group>
        <div className="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:gap-x-4">
          <Link href={route('login')} className="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-600">
            Log in <span aria-hidden="true">&rarr;</span>
          </Link>
        </div>
      </nav>

      <Dialog as="div" className="lg:hidden" open={mobileMenuOpen} onClose={setMobileMenuOpen}>
        <div className="fixed inset-0 z-10" />
        <Dialog.Panel className="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
          <div className="flex items-center justify-between">
            <Link href={route('home')} className="-m-1.5 p-1.5">
              <span className="sr-only">The Family History Guide</span>
              <ApplicationLogo className="h-8 w-auto"/>
            </Link>
            <button
              type="button"
              className="-m-2.5 rounded-md p-2.5 text-gray-700"
              onClick={() => setMobileMenuOpen(false)}
            >
              <span className="sr-only">Close menu</span>
              <XMarkIcon className="h-6 w-6" aria-hidden="true" />
            </button>
          </div>

          <div className="mt-6 flow-root">
            <div className="-my-6 divide-y divide-gray-500/10">
              <div className="space-y-2 py-6">
                {navigation.map((item: {name: string, menuItems: any[]}) => (
                  <Disclosure as="div" className="-mx-3">
                    {({open}) => (
                      <>
                        <Disclosure.Button className="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                          {item.name}
                          <ChevronDownIcon
                            className={classNames(open ? 'rotate-180' : '', 'h-5 w-5 flex-none')}
                            aria-hidden="true"
                          />
                        </Disclosure.Button>
                        <Disclosure.Panel className="mt-2 space-y-2">
                          {item.menuItems.map((link: {name: string, link: string}, index: number) => (
                            <Disclosure.Button
                              key={index}
                              as="a"
                              href={link.link}
                              className="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                            >
                              {link.name}
                            </Disclosure.Button>
                          ))}
                        </Disclosure.Panel>
                      </>
                    )}
                  </Disclosure>
                ))}
              </div>
            </div>
          </div>
        </Dialog.Panel>
      </Dialog>
    </header>
  );
}
