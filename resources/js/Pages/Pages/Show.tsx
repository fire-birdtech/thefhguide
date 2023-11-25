import {type ReactElement} from "react"
import {Head} from "@inertiajs/react"
import MainNavigation from "@/Components/Navigation/Main"
import {type Page} from "@/types"
import {ContentSlug} from "@/enums";
import FullWidthHero from "@/Components/Content/Display/FullWidthHero";

export default function PagesShow({ page, title }: { page: Page, title: string }): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

    <div className="pt-[8.5rem]">
      {page.content.map((item, index) => {
        if (item.type === ContentSlug.HERO_FULL_WIDTH) return <FullWidthHero key={index} hero={item}/>
      })}
    </div>
    </>
  )
}
