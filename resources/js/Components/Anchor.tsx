import { type PropsWithChildren, type ReactElement } from 'react'

export default function Anchor ({
  children, className, href, target
}: PropsWithChildren<{ className: string, href?: string, target?: string }>): ReactElement {
  return (
    <a
      href={href}
      className={className}
      target={target}
      rel="nofollow noopener noreferrer"
    >
      {children}
    </a>
  )
}
