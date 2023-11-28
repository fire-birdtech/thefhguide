import {type ReactElement} from "react"
import {ContentSlug} from "@/enums"

import HeroFullWidth from "@images/hero-full-width.png"
import HeroTwoColumn from "@images/hero-two-column.png"
import ImageLinkGrid from "@images/image-link-grid.png"
import ContentRightAlignedImage from "@images/content-with-right-aligned-image.png"
import SimpleContent from "@images/simple-content.png"

const buttons = [
  { label: 'Hero Full Width', slug: ContentSlug.HERO_FULL_WIDTH, image: HeroFullWidth },
  { label: 'Hero Two Column', slug: ContentSlug.HERO_TWO_COLUMN, image: HeroTwoColumn },
  { label: 'Image Link Grid', slug: ContentSlug.IMAGE_LINK_GRID, image: ImageLinkGrid },
  { label: 'Content (Right-aligned image)', slug: ContentSlug.CONTENT_RIGHT_IMAGE, image: ContentRightAlignedImage },
  { label: 'Simple Content', slug: ContentSlug.SIMPLE_CONTENT, image: SimpleContent },
]

export default function AddContent ({ add }: { add: (value: string) => void }): ReactElement {
  return (
    <>
      <ul className="col-span-3 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 sm:gap-y-10 md:grid-cols-3 xl:grid-cols-4s xl:gap-x-8">
        {buttons.map((button, index) => (
          <li key={index}>
            <div className="group relative before:absolute before:-inset-2.5 before:rounded-[18px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
              <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/20">
                <img src={button.image} alt="" className="absolute inset-0 h-full w-full"/>
              </div>
              <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
                <button type="button" title={`Add ${button.label}`} onClick={() => add(button.slug)}>
                  <span className="absolute -inset-2.5 z-10"/>
                  <span className="relative">
                    {button.label}
                  </span>
                </button>
              </h4>
            </div>
          </li>
        ))}
      </ul>
    </>
  )
}
