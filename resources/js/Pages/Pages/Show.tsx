import {type ReactElement} from "react"
import {Head} from "@inertiajs/react"
import MainNavigation from "@/Components/Navigation/Main"
import {type Page} from "@/types"
import Container from "@/Components/Container";

export default function PagesShow({ page, title }: { page: Page, title: string }): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

      <div className="pt-[8.5rem]">
        <Container>
          <h2>{page.name}</h2>
        </Container>
      </div>
    </>
  )
}
