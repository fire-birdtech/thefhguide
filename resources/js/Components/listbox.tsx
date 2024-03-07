import { Fragment, type ReactElement } from 'react'
import { Listbox as HeadlessListbox, Transition } from '@headlessui/react'
import classNames from '@/Utils/classNames'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/react/24/solid'
import { capitalize } from '@/Utils/string'

interface ListboxProps {
  change: (value: string) => void
  options: any[]
  value: any
}

export default function Listbox ({ change, options, value }: ListboxProps): ReactElement {
  return (
    <HeadlessListbox value={value} onChange={(value) => { change(value) }}>
      {({ open }) => (
        <div className="relative mt-1 sm:mt-0 sm:col-span-2">
          <HeadlessListbox.Button
            className="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <span className={classNames(
              'block truncate',
              value === '' ? 'text-gray-500' : ''
            )}>
              {value !== '' ? capitalize(value) : 'Select a type'}
            </span>
            <span className="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
              <ChevronUpDownIcon className="h-5 w-5 text-gray-400"/>
            </span>
          </HeadlessListbox.Button>

          <Transition
            show={open}
            as={Fragment}
            leave="transition ease-in duration-100"
            leaveFrom="opacity-100"
            leaveTo="opacity-0"
          >
            <HeadlessListbox.Options className="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
              {options.map((option: any, optionIdx: number) => (
                <HeadlessListbox.Option
                  key={option.id ?? optionIdx}
                  className={({ active }) =>
                    classNames(
                      active ? 'bg-blue-600 text-white' : 'text-gray-900',
                      'relative cursor-default select-none py-2 pl-3 pr-9'
                    )
                  }
                  value={option}
                >
                  {({ active, selected }) => (
                    <>
                      <span className={classNames(selected ? 'font-semibold' : 'font-normal', 'block truncate')}>
                        {capitalize(option)}
                      </span>

                      {selected ? (
                        <span
                          className={classNames(
                            active ? 'text-white' : 'text-blue-600',
                            'absolute inset-y-0 right-0 flex items-center pr-4'
                          )}
                        >
                          <CheckIcon className="h-5 w-5" aria-hidden="true" />
                        </span>
                      ) : null}
                    </>
                  )}
                </HeadlessListbox.Option>
              ))}
            </HeadlessListbox.Options>
          </Transition>
        </div>
      )}
    </HeadlessListbox>
  )
}
