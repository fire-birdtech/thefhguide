export default function Image ({ border, className, src, width }: { border?: boolean, className?: string, src: string, width?: string }) {
  return (
    <>
      <img
        className={className}
        src={src}
        alt=""
        width={width}
      />
      {border && <div className="absolute inset-0 ring-1 ring-inset ring-black" />}
    </>
  )
}
