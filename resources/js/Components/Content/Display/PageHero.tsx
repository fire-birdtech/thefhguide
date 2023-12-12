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
        <div className="relative mx-auto max-w-5xl pt-28 space-y-2">
          <h1 className="text-[#2ec4b6] font-bold text-[2.5rem] leading-[3rem] font-display">
            {hero.title}
          </h1>
          <a href={hero.button_link} className="text-xl p-4 inline-block rounded transition-all duration-300 ease-in-out bg-[#02253d] text-white border border-transparent hover:bg-white hover:text-[#02253d] hover:border-[#02253d]" target="_blank" rel="noopener nofollow noreferrer">
            {hero.button_text}
          </a>
        </div>
      </div>
    </div>
  )
}