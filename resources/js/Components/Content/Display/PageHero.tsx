import {type ReactElement} from "react";
import {type Hero} from "@/types";

export default function PageHero ({ hero }: { hero: Hero }): ReactElement {
  return (
    <div>
      <div className="relative overflow-hidden bg-gray-900 px-6 py-20 sm:px-10 sm:py-16 md:px-12 lg:px-20">
        <img
          className="absolute inset-0 h-full w-full object-cover scale-125"
          src={hero.image_url}
          alt=""
        />
      </div>
    </div>
  )
}
