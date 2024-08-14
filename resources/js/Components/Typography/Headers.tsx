import { type ComponentPropsWithoutRef, type PropsWithChildren, type ReactElement } from 'react'
import clsx from 'clsx'

const styles = {
  colors: {
    teal: [
      'text-teal-600'
    ],
    zinc: [
      'text-zinc-950'
    ]
  },
  fontFamily: {
    display: ['font-display'],
    sans: ['font-sans']
  },
  size: [
    [], // index offset since there is no <h0>
    ['text-2xl font-medium sm:text-4xl'],
    ['text-xl font-medium sm:text-3xl'],
    ['text-lg/8 font-bold'],
    ['text-base/6 font-bold'],
    ['text-sm font-bold'],
    []
  ]
}

type HeadingProps = {
  level?: 1 | 2 | 3 | 4 | 5 | 6
  color?: keyof typeof styles.colors
  fontFamily?: keyof typeof styles.fontFamily
} & ComponentPropsWithoutRef<'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6'>

export function Heading ({ className, level = 1, color, fontFamily = 'display', ...props }: HeadingProps): ReactElement {
  const Element: `h${typeof level}` = `h${level}`

  const classes = clsx(
    className,
    color !== undefined ? styles.colors[color] : styles.colors.zinc,
    styles.size[level],
    styles.fontFamily[fontFamily]
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
