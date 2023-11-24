import {type ReactElement} from "react"

import HeroFullWidth from "@images/hero-full-width.png"
import HeroTwoColumn from "@images/hero-two-column.png"
import ImageLinkGrid from "@images/image-link-grid.png"

export default function AddContent (): ReactElement {
  return (
    <ul className="col-span-3 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 sm:gap-y-10 md:grid-cols-3 xl:grid-cols-4s xl:gap-x-8">
      <li>
        <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
          <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
            <img src={HeroFullWidth} alt="" className="absolute inset-0 h-full w-full"/>
          </div>
          <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
            <a href="#">
              <span className="absolute -inset-2.5 z-10"/>
              <span className="relative">
                Hero Full Width
              </span>
            </a>
          </h4>
        </div>
      </li>

      <li>
        <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
          <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
            <img src={HeroTwoColumn} alt="" className="absolute inset-0 h-full w-full"/>
          </div>
          <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
            <a href="#">
              <span className="absolute -inset-2.5 z-10"/>
              <span className="relative">
                Hero Two Column
              </span>
            </a>
          </h4>
        </div>
      </li>

      <li>
        <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
          <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
            <img src={ImageLinkGrid} alt="" className="absolute inset-0 h-full w-full"/>
          </div>
          <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
            <a href="#">
              <span className="absolute -inset-2.5 z-10"/>
              <span className="relative">
                Image Link Grid
              </span>
            </a>
          </h4>
        </div>
      </li>
    </ul>
  )
}
