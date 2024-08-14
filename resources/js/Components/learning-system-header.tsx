import { type ReactElement } from 'react'

interface Props {
  image: string
  text: ReactElement
}

export default function LearningSystemHeader ({ image, text }: Props): ReactElement {
  return (
    <div className="relative bg-stone-100">
      <div className="h-56 sm:h-96 md:absolute md:right-0 md:h-full md:w-1/2">
        <img
          src={image}
          alt=""
          className="h-full w-full object-cover border border-stone-900"
        />
      </div>
      <div className="relative px-4 py-12 sm:px-6 md:py-12 lg:px-8">
        <div className="text-center space-y-4 md:space-y-8 md:w-1/2">
          {text}
        </div>
      </div>
    </div>
  )
}
