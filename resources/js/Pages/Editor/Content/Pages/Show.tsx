import {type ReactElement} from "react";
import {type Page, type PageProps} from "@/types";
import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import SecondaryButtonWithDropdown from "@/Components/Buttons/SecondaryButtonWithDropdown";
import PageHero from "@/Components/Content/Display/PageHero";
import DescriptionListItem from "@/Components/Lists/DescriptionListItem";
import ArticleWrapper from "@/Components/Content/Display/ArticleWrapper";
import ContentSectionShow from "@/Components/ContentSectionShow";

type PageShowProps = {
  page: Page
} & PageProps

export default function PageShow ({ auth, page }: PageShowProps): ReactElement {
  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('editor.pages.edit', [page.id]) }
    ],
    [
      { name: 'Archive', as: 'emitter', icon: 'ArchiveBoxIcon', emit: () => {} }
    ]
  ]

  return (
    <>
      <Head title={`Admin - Pages - ${page.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Page Details: {page.name}
              </Header3>
            </div>
            <div className="ml-4">
              <SecondaryButtonWithDropdown
                actions={actions}
                buttonText="Options"
              />
            </div>
          </div>

          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <dl className="sm:divide-y sm:divide-gray-200">
              <DescriptionListItem term="Name" details={page.name}/>
              {page.hero !== null && (
                <DescriptionListItem term="Hero">
                  <PageHero hero={page.hero}/>
                </DescriptionListItem>
              )}
              <DescriptionListItem term="Content">
                <ArticleWrapper>
                  {page.content !== null && page.content.map((item, index) => (
                    <ContentSectionShow key={index} section={item}/>
                  ))}
                </ArticleWrapper>
              </DescriptionListItem>
            </dl>
          </div>
        </Container>
      </Admin>
    </>
  )
}
