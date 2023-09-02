import {Fragment, PropsWithChildren} from "react";
import {Link} from "@inertiajs/react";
import {Menu, Transition} from "@headlessui/react";
import {ChevronDownIcon} from "@heroicons/react/24/solid";
import ApplicationLogo from "@/Components/ApplicationLogo";
import classNames from "@/Utils/classNames";
import AdminNavigation from "@/Components/Navigation/Admin";
import {User} from "@/types";

export default function Admin({ user, children }: PropsWithChildren<{ user: User }>) {
    return (
        <>
            <div className="min-h-screen bg-gray-100">
                <nav className="bg-white border-b border-gray-100">
                    <div className="px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between h-16">
                            <div className="flex">
                                <div className="shrink-0 flex items-center">
                                    <ApplicationLogo className="block h-9 w-auto"/>
                                </div>
                                <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"/>
                            </div>
                            <div className="hidden sm:flex sm:items-center sm:ml-6 sm:space-x-3">
                                {/*Notification Dropdown*/}

                                <Menu as="div" className="relative inline-block text-left">
                                    <div>
                                        <Menu.Button className="inline-flex items-center rounded-md px-3 py-2 border border-transparent text-sm leading-4 font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {user.name}
                                            <ChevronDownIcon className="ml-2 -mr-0.5 h-4 w-4" aria-hidden="true"/>
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
                                        <Menu.Items className="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div className="py-1">
                                                <Menu.Item>
                                                    {({ active }) => (
                                                        <Link
                                                            href={route('settings.profile')}
                                                            className={classNames(
                                                                active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                                                                'block w-full text-left px-4 py-2 text-sm'
                                                            )}
                                                        >
                                                            Settings
                                                        </Link>
                                                    )}
                                                </Menu.Item>
                                                <Menu.Item>
                                                    {({ active }) => (
                                                        <Link
                                                            href={route('logout')}
                                                            method="post"
                                                            className={classNames(
                                                                active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                                                                'block w-full text-left px-4 py-2 text-sm'
                                                            )}
                                                        >
                                                            Log Out
                                                        </Link>
                                                    )}
                                                </Menu.Item>
                                            </div>
                                        </Menu.Items>
                                    </Transition>
                                </Menu>
                            </div>

                            {/*Hamburger*/}
                        </div>
                    </div>

                    {/*Responsive Navigation Menu*/}
                </nav>

                <main className="flex">
                    <AdminNavigation/>
                    {children}
                </main>
            </div>
        </>
    );
}
