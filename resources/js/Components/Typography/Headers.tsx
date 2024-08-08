import { type ComponentPropsWithoutRef, type PropsWithChildren, type ReactElement } from 'react'
import classNames from '@/Utils/classNames'
import clsx from 'clsx'

const styles = {
  base: [
    'text-zinc-950'
  ],
  size: [
    [],
    ['text-2xl/8 font-display font-medium sm:text-4xl/8'],
    [],
    ['text-lg/8 font-sans font-bold'],
    ['text-base/6 font-sans font-bold'],
    [],
    []
  ]
}

type HeadingProps = { level?: 1 | 2 | 3 | 4 | 5 | 6 } & ComponentPropsWithoutRef<
'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6'
>

export function Heading ({ className, level = 1, ...props }: HeadingProps): ReactElement {
  const Element: `h${typeof level}` = `h${level}`

  const classes = clsx(
    className,
    styles.base,
    styles.size[level]
  )

  return (
    <Element
      {...props}
      className={classes}
    />
  )
}

export function Header3 ({ children }: PropsWithChildren): ReactElement {
  return (
    <h3 className="text-lg leading-6 font-medium text-gray-900">
      {children}
    </h3>
  )
}

export function Header5 ({ children }: PropsWithChildren): ReactElement {
  return (
      <h5 className="text-xl leading-6 font-medium text-gray-900">
          {children}
      </h5>
  )
}
