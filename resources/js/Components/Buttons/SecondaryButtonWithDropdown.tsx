import {Fragment} from "react";
import {Menu, Transition} from "@headlessui/react";
import {ChevronDownIcon} from "@heroicons/react/24/solid";
import classNames from "@/Utils/classNames";
import {Link} from "@inertiajs/react";
import {ButtonMenuItem, ExternalLinkMenuItem, InternalLinkMenuItem} from "@/Components/MenuItems";

const menuItemStyles = (active: boolean) => {
  return classNames(
    active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
    'group flex items-center px-4 py-2 text-sm',
  );
}

const iconStyles: string = 'mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500';

export default function SecondaryButtonWithDropdown({actions, buttonText}: { actions: any[], buttonText:string }) {
  return (
    <Menu as="div" className="relative inline-block text-left">
      <div>
        <Menu.Button
          className="relative inline-flex bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto">
          {buttonText}
          <ChevronDownIcon className="-mr-1 ml-2 h-5 w-5" aria-hidden="true"/>
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
        <Menu.Items
          className="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          {actions.map((actionGroup, agIdx) => (
            <div className="py-1" key={agIdx}>
              {actionGroup.map((action: any, actionIdx: number) => {
                if (action.target !== undefined) return <ExternalLinkMenuItem key={actionIdx} action={action}/>
                else if (action.as === 'link') return <InternalLinkMenuItem key={actionIdx} action={action}/>
                else if (action.as === 'emitter') return <ButtonMenuItem key={actionIdx} action={action}/>
              })}
            </div>
          ))}
        </Menu.Items>
      </Transition>
    </Menu>
  );
}
