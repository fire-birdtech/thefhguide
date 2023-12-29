export default function Image ({ className, src, width }: { className?: string, src: string, width?: string }) {
  return (
    <>
      <img
        className={className}
        src={src}
        alt=""
        width={width}
      />
      <div className="absolute inset-0 ring-1 ring-inset ring-black" />
    </>
  )
}
