import {type ReactElement} from "react"
import {Head} from "@inertiajs/react"
import MainNavigation from "@/Components/Navigation/Main"
import {type Page} from "@/types"
import ArticleWrapper from "@/Components/Content/Display/ArticleWrapper";
import ContentSectionShow from "@/Components/ContentSectionShow";
import PageHero from "@/Components/Content/Display/PageHero";
import SiteFooter from "@/Components/SiteFooter";

export default function PagesShow({ page, title }: { page: Page, title: string }): ReactElement {
  // const hero = page.content.find((item) => item.type === ContentSlug.HERO_FULL_WIDTH)

  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

      <div className="pt-[8.5rem]">
        {page.hero !== null ? (
          <PageHero hero={page.hero}/>
        ) : null}
        <ArticleWrapper>
          {page.content !== null && page.content.map((item, index) => (
            <ContentSectionShow key={index} section={item}/>
          ))}
        </ArticleWrapper>
      </div>

      <SiteFooter/>
    </>
  )
}
