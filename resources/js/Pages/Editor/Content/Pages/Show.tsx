import {type ReactElement} from "react";
import {type Page, type PageProps} from "@/types";
import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import SecondaryButtonWithDropdown from "@/Components/Buttons/SecondaryButtonWithDropdown";

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
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  Name
                </dt>
                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {page.name}
                </dd>
              </div>
            </dl>
          </div>
        </Container>
      </Admin>
    </>
  )
}
