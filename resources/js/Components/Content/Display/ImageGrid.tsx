import { type ReactElement } from 'react'
import { type GridImage } from '@/types'
import Image from '@/Components/image'

export default function ImageGrid ({ images }: { images: GridImage[] }): ReactElement {
  return (
    <div className="mx-auto grid max-w-2xl grid-cols-1 gap-y-8 mt-4 mb-6 lg:-mx-[15px] lg:max-w-none lg:grid-cols-4">
      {images.map((image, index) => (
        <div key={index} className="w-full sm:px-4">
          <article key={index} className="not-prose group relative flex flex-col items-start justify-between lg:w-[120%]">
            <div className="w-auto relative">
              <Image
                src={image.image_url}
                border={image.border}
                className="aspect-[3/2] object-cover sm:max-w-[200px]"
              />
              <div className="flex items-center absolute top-0 bottom-0 z-10 -ml-4 mr-2 my-auto opacity-0 transition-opacity ease-in-out duration-500 group-hover:opacity-100">
                <div className="bg-[#EBEBEB] p-2">
                  <p className="text-xs">
                    {image.text}
                  </p>
                </div>
              </div>
            </div>
            <div className="max-w-xl">
              <h3 className="text-lg font-bold leading-6 text-[#006666] hover:text-[#0056B3] hover:underline">
                <a href={image.link} target="_blank" rel="noreferrer">
                  <span className="absolute inset-0 z-20" />
                  {image?.title ?? ''}
                </a>
              </h3>
            </div>
          </article>
        </div>
      ))}
    </div>
  )
}
