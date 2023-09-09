import {Fragment, MouseEventHandler} from "react";
import {Menu, Transition} from "@headlessui/react";
import {Link} from "@inertiajs/react";
import {ChevronDownIcon} from "@heroicons/react/24/solid";
import classNames from "@/Utils/classNames";
import {ButtonMenuItem} from "@/Components/MenuItems";

const buttonStyles = "inline-flex items-center rounded-l-md rounded-r-none bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40";

export default function PrimaryButtonWithDropDown({
  action,
  href,
  options,
  save
}: {
  action: string,
  href?: string,
  options: {}[],
  save: MouseEventHandler,
}) {
  return (
    <Menu as="div" className="relative inline-block text-left">
      <div className="inline-flex divide-x divide-blue-700 rounded-md">
        {href !== undefined ? (
          <Link href={href} className={buttonStyles}>
            {action}
          </Link>
        ) : (
          <button onClick={save} className={buttonStyles}>
            {action}
          </button>
        )}
        <Menu.Button className="inline-flex items-center rounded-l-none rounded-r-md bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-40">
          <ChevronDownIcon className="h-5 w-5 text-white" aria-hidden="true"/>
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
        <Menu.Items className="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          <div className="py-1">
            {options.map((option, optionIdx) => {
              if (option.show) {
                return <ButtonMenuItem action={option}/>;
              }
            })}
          </div>
        </Menu.Items>
      </Transition>
    </Menu>
  );
}
