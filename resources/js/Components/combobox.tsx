import * as Headless from '@headlessui/react'
import {Fragment, ReactElement} from "react";

export function Combobox ({
  className,
  placeholder,
  'aria-label': ariaLabel,
  children: options,
  ...props
}: {
  className?: string
  placeholder?: React.ReactNode
  'aria-label'?: string
  children?: React.ReactNode
} & Omit<Headless.ComboboxProps<typeof Fragment, T>, 'as' | 'multiple'>): ReactElement {
  return (
    <Headless.Combobox {...props} multiple={false}>
      <Headless.ComboboxInput
        aria-label={ariaLabel}
      />
    </Headless.Combobox>
  )
}
