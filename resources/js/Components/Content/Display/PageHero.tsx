import { type ReactElement } from 'react'
import { type Hero } from '@/types'
import { HeroType } from '@/enums'

function FullWidth ({ hero }: { hero: Hero }): ReactElement {
  return (
    <div className="relative overflow-hidden bg-gray-900 px-6 py-20 sm:px-10 sm:py-16 md:px-12 lg:px-20">
      <img
        className="absolute inset-0 h-full w-full object-cover scale-125"
        src={hero.image_url}
        alt=""
      />
      <div className="relative mx-auto max-w-body pt-28 space-y-2">
        <h1 className="text-[#2ec4b6] font-bold text-[2.5rem] leading-[3rem] font-display">
          {hero.title}
        </h1>
        <a href={hero.button_link} className="text-xl p-4 inline-block rounded transition-all duration-300 ease-in-out bg-[#02253d] text-white border border-transparent hover:bg-white hover:text-[#02253d] hover:border-[#02253d]" target="_blank" rel="noopener nofollow noreferrer">
          {hero.button_text}
        </a>
      </div>
    </div>
  )
}

function TwoColumn ({ hero }: { hero: Hero }): ReactElement {
  return (
    <div className="relative flex items-center bg-stone-100 md:h-96">
      <div className="h-56 sm:h-96 md:absolute md:right-0 md:h-full md:w-1/2">
        <img
          src={hero.image_url}
          alt=""
          className="h-full w-full object-cover border border-stone-900"
        />
      </div>
      <div className="relative px-4 py-16 sm:px-6 md:w-1/2 lg:px-8">
        <div className="text-center space-y-8">
          <h2 className="text-3xl font-display font-bold tracking-normal text-stone-800 sm:text-4.5xl">
            {hero.title}
          </h2>
          <h3 className="text-2.5xl font-display font-base text-stone-800">
            {hero.subtitle}
          </h3>
        </div>
      </div>
    </div>
  )
}

export default function PageHero ({ hero }: { hero: Hero }): ReactElement {
  return hero.type === HeroType.HERO_FULL_WIDTH
    ? <FullWidth hero={hero}/>
    : <TwoColumn hero={hero}/>
}
