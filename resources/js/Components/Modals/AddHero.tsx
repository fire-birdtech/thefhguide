import { type ReactElement } from 'react'
import ModalWrapper from '@/Components/Modals/Wrapper'
import { Dialog } from '@headlessui/react'
import { ContentSlug } from '@/enums'

import HeroFullWidth from '@images/hero-full-width.png'
import HeroTwoColumn from '@images/hero-two-column.png'

const heroes = [
  { label: 'Hero Full Width', slug: ContentSlug.HERO_FULL_WIDTH, image: HeroFullWidth },
  { label: 'Hero Two Column', slug: ContentSlug.HERO_TWO_COLUMN, image: HeroTwoColumn }
]

export default function AddHeroModal ({ add, close, open }: { add: (value: string) => void, close: () => void, open: boolean }): ReactElement {
  return (
    <ModalWrapper close={close} open={open}>
      <Dialog.Panel className="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all divide-y divide-gray-200 sm:my-8 sm:w-full sm:max-w-xl">
        <Dialog.Title
          as="h3"
          className="text-lg font-medium leading-6 text-gray-900 p-4 sm:px-6"
        >
          Choose a hero type
        </Dialog.Title>
        <Dialog.Description className="p-8">
          <ul className="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 sm:gap-y-10 xl:gap-x-8">
            {heroes.map((hero, index) => (
              <li key={index}>
                <div className="group relative before:absolute before:-inset-2.5 before:rounded-[18px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
                  <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/20">
                    <img src={hero.image} alt="" className="absolute inset-0 h-full w-full"/>
                  </div>
                  <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
                    <button type="button" title={`Add ${hero.label}`} onClick={() => { add(hero.slug) }}>
                      <span className="absolute -inset-2.5 z-10"/>
                      <span className="relative">
                        {hero.label}
                      </span>
                    </button>
                  </h4>
                </div>
              </li>
            ))}
          </ul>
        </Dialog.Description>
      </Dialog.Panel>
    </ModalWrapper>
  )
}
