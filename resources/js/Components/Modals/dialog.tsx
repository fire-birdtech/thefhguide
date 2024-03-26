import {
  type ComponentPropsWithoutRef,
  Fragment,
  type ReactElement,
  type ReactNode,
  useEffect, useState
} from 'react'
import {
  type DialogProps as HeadlessDialogProps,
  Dialog as HeadlessDialog,
  Transition as HeadlessTransition
} from '@headlessui/react'
import classNames from '@/Utils/classNames'

export const sizes = {
  xs: 'sm:max-w-xs',
  sm: 'sm:max-w-sm',
  md: 'sm:max-w-md',
  lg: 'sm:max-w-lg',
  xl: 'sm:max-w-xl',
  '2xl': 'sm:max-w-2xl',
  '3xl': 'sm:max-w-3xl',
  '4xl': 'sm:max-w-4xl',
  '5xl': 'sm:max-w-5xl'
}

export function Dialog ({
  open,
  onClose,
  size = 'lg',
  className,
  children,
  ...props
}: { size?: keyof typeof sizes, children: ReactNode } & HeadlessDialogProps<any>): ReactElement {
  const [modalWidth, setModalWidth] = useState(size)

  useEffect(() => {
    setModalWidth(size)
  }, [size])

  return (
    <HeadlessTransition.Root show={open} as={Fragment} {...props}>
      <HeadlessDialog as="div" className="relative z-30" onClose={onClose}>
        <HeadlessTransition.Child
          as={Fragment}
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </HeadlessTransition.Child>

        <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div className="flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
            <HeadlessTransition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enterTo="opacity-100 translate-y-0 sm:scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 translate-y-0 sm:scale-100"
              leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
              <HeadlessDialog.Panel
                className={classNames(
                  className,
                  'relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all divide-y divide-gray-200 sm:my-8 sm:w-full',
                  sizes[size]
                )}
              >
                {children}
              </HeadlessDialog.Panel>
            </HeadlessTransition.Child>
          </div>
        </div>
      </HeadlessDialog>
    </HeadlessTransition.Root>
  )
}

export function DialogTitle ({ className, ...props }: ComponentPropsWithoutRef<'div'>): ReactElement {
  return (
    <HeadlessDialog.Title
      {...props}
      as="h3"
      className={classNames(
        className,
        'text-lg font-medium leading-6 text-gray-900 p-4 sm:px-6'
      )}
    />
  )
}

export function DialogDescription ({ className, ...props }: ComponentPropsWithoutRef<'div'>): ReactElement {
  return (
    <HeadlessDialog.Description {...props} className={className} />
  )
}

export function DialogBody ({ className, ...props }: ComponentPropsWithoutRef<'div'>): ReactElement {
  return (
    <div {...props} className={className} />
  )
}

export function DialogActions ({ className, ...props }: ComponentPropsWithoutRef<'div'>): ReactElement {
  return (
    <div
      {...props}
      className={classNames(
        className,
        'flex flex-col-reverse items-center justify-end gap-3 px-6 py-3 *:w-full sm:flex-row sm:*:w-auto'
      )}
    />
  )
}
