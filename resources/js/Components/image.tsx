import { type ReactElement } from 'react'

export default function Image ({ border, className, src, width }: { border?: boolean, className?: string, src: string, width?: string }): ReactElement {
  return (
    <>
      <img
        className={className}
        src={src}
        alt=""
        width={width}
      />
      {border !== null && <div className="absolute inset-0 ring-1 ring-inset ring-black" />}
    </>
  )
}
