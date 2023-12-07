import {type ReactElement} from "react"
import {Head} from "@inertiajs/react"
import MainNavigation from "@/Components/Navigation/Main"
import {type Page} from "@/types"
import ArticleWrapper from "@/Components/Content/Forms/ArticleWrapper";
import ContentSectionShow from "@/Components/ContentSectionShow";

export default function PagesShow({ page, title }: { page: Page, title: string }): ReactElement {
  // const hero = page.content.find((item) => item.type === ContentSlug.HERO_FULL_WIDTH)

  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

      <div className="pt-[8.5rem]">
        {/*{hero !== null ? (*/}
        {/*  <FullWidthHero hero={hero}/>*/}
        {/*) : null}*/}
        <ArticleWrapper>
          {page.content.map((item, index) => (
            <ContentSectionShow key={index} section={item}/>
          ))}
        </ArticleWrapper>
      </div>
    </>
  )
}
