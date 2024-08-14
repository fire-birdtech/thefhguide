import * as Headless from '@headlessui/react'
import { type ComponentPropsWithoutRef, type ForwardedRef, forwardRef } from 'react'
import { Link as InertiaLink, type InertiaLinkProps } from '@inertiajs/react'
import clsx from 'clsx'

export const Link = forwardRef(function Link (
  props: InertiaLinkProps & ComponentPropsWithoutRef<'a'>,
  ref: ForwardedRef<HTMLAnchorElement>
) {
  return (
    <Headless.DataInteractive>
      <InertiaLink
        {...props}
        className={clsx(props.className, 'text-[#17A08F] hover:text-[#0056B3] hover:underline')}
        ref={ref}
      />
    </Headless.DataInteractive>
  )
})
