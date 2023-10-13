import {ReactElement} from "react";

export default function ({
  children, className, href, target,
}: {children: ReactElement, className: string, href: string, target: string}): ReactElement {
  return (
    <a
      href={href}
      className={className}
      target={target}
      rel="nofollow noopener noreferrer"
    >
      {children}
    </a>
  );
}
