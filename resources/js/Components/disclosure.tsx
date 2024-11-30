import * as Headless from '@headlessui/react'
import { type ReactElement } from 'react'

export function Disclosure (props: Headless.DisclosureProps): ReactElement {
  return <Headless.Disclosure {...props} />
}

export function DisclosureButton (props: Headless.DisclosureButtonProps): ReactElement {
  return <Headless.DisclosureButton as="button" {...props} />
}

export function DisclosurePanel (props: Headless.DisclosurePanelProps): ReactElement {
  return <Headless.DisclosurePanel {...props} />
}
