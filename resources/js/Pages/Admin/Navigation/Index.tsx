import { type ReactElement } from 'react'
import {Head, usePage} from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from "@/Components/Container";
import { type PageProps } from '@/types'
import {XMarkIcon} from "@heroicons/react/24/solid";

export default function NavigationIndex ({ auth }: PageProps): ReactElement {
  const { navigation } = usePage().props

  return (
    <>
      <Head title="Site Navigation"/>

      <Admin user={auth.user}>
        <Container>
          <ul
            role="list"
            className="max-w-xl mx-auto divide-y divide-gray-100 overflow-hidden"
          >
            {navigation.map((item, index) => (
              <>
                <li key={index} className="relative bg-white flex justify-between gap-x-6 px-4 py-3 hover:bg-gray-50">
                  <div className="flex min-w-0 gap-x-4">
                    <svg className="fill-gray-500" viewBox="0 0 20 20" width="12">
                      <path d="M7 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 2zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 14zm6-8a2 2 0 1 0-.001-4.001A2 2 0 0 0 13 6zm0 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 14z"></path>
                    </svg>
                    <div className="min-w-0 flex-auto">
                      <p className="text-sm leading-6 text-gray-900">
                        {item.name}
                      </p>
                    </div>
                  </div>
                  <div className="flex shrink-0 items-center gap-x-4">
                    <XMarkIcon className="h-4 w-4 flex-none text-gray-400" aria-hidden="true"/>
                  </div>
                </li>
                {item.menuItems.map((menuItem, index) => (
                  <li key={index} className="ml-16 relative bg-white flex justify-between gap-x-6 px-4 py-3 hover:bg-gray-50">
                    <div className="flex min-w-0 gap-x-4">
                      <svg className="fill-gray-500" viewBox="0 0 20 20" width="12">
                        <path d="M7 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 2zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 14zm6-8a2 2 0 1 0-.001-4.001A2 2 0 0 0 13 6zm0 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 14z"></path>
                      </svg>
                      <div className="min-w-0 flex-auto">
                        <p className="text-sm leading-6 text-gray-900">
                          {menuItem.name}
                        </p>
                      </div>
                    </div>
                    <div className="flex shrink-0 items-center gap-x-4">
                      <XMarkIcon className="h-4 w-4 flex-none text-gray-400" aria-hidden="true"/>
                    </div>
                  </li>
                ))}
              </>
            ))}
          </ul>
        </Container>
      </Admin>
    </>
  )
}
