import {type ReactElement} from "react"
import {Head} from "@inertiajs/react"
import MainNavigation from "@/Components/Navigation/Main"
import {type Page} from "@/types"
import {ContentSlug} from "@/enums";
import FullWidthHero from "@/Components/Content/Display/FullWidthHero";
import ContentRightImage from "@/Components/Content/Display/ContentRightImage";
import ArticleWrapper from "@/Components/Content/Forms/ArticleWrapper";
import SimpleContent from "@/Components/Content/Display/SimpleContent";

export default function PagesShow({ page, title }: { page: Page, title: string }): ReactElement {
  const hero = page.content.find((item) => item.type === ContentSlug.HERO_FULL_WIDTH)

  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

      <div className="pt-[8.5rem]">
        {hero !== null ? (
          <FullWidthHero hero={hero}/>
        ) : null}
        <ArticleWrapper>
          {page.content.map((item, index) => {
            if (item.type === ContentSlug.CONTENT_RIGHT_IMAGE) return <ContentRightImage key={index} content={item}/>
            if (item.type === ContentSlug.SIMPLE_CONTENT) return <SimpleContent key={index} content={item}/>
          })}
        </ArticleWrapper>
      </div>
    </>
  )
}
