import {type PropsWithChildren, type ReactElement} from "react";

export default function ExternalLink ({ children, className, href }: PropsWithChildren<{ className?: string, href: string }>): ReactElement {
  return (
    <a className={className} href={href} target="_blank" rel="nofollow noopener noreferrer">
      {children}
    </a>
  )
}
