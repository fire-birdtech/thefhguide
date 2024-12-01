import { type ReactElement } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { type Group, type PageProps, type UserDataAccess } from '@/types'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'
import { Head, Link } from '@inertiajs/react'
import { Heading } from '@/Components/Typography/Headers'
import CreateGroup from '@/Pages/Groups/partials/create-group'
import RequestUserDataAccess from '@/Pages/Groups/partials/request-user-data-access'
import MyDataRequests from '@/Pages/Groups/partials/my-data-requests'
import DataRequestsForMe from '@/Pages/Groups/partials/data-requests-for-me'

type Props = {
  dataRequests: UserDataAccess[]
  dataRequestsForMe: UserDataAccess[]
  groups: Group[]
} & PageProps

export default function Groups ({ auth, dataRequests, dataRequestsForMe, groups }: Props): ReactElement {
  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation />}
    >
      <Head title="Tracker Reports Groups" />

      <div className="p-4 sm:px-6 lg:px-8">
        <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
          <Heading className="p-4">
            Groups
          </Heading>
          <div className="border-t border-gray-300 p-4 space-y-4">
            <p>
              All reports are run with data from Group members. A Group contains a list of email addresses associated
              with accounts in The Family History Guide. When you run a Group report, it compiles the slider-bar
              responses from all non-private accounts contained in the group and then produces a report. Sharing your
              data in a Group does not grant access to view Notes fields; those are always private.
            </p>
            <div className="mt-4 grid grid-cols-12 gap-x-4">
              <div className="col-span-4">
                <CreateGroup />
              </div>
              <div className="col-span-8">
                <RequestUserDataAccess />
              </div>
            </div>

            <div className="mt-4 grid grid-cols-12 gap-x-4">
              <div className="col-span-4">
                <Heading level={2}>
                  Your Groups:
                </Heading>
                <p>
                  These are the groups you have access to see.
                </p>
                <ul className="ml-6 list-disc">
                  {groups.map((group) => (
                    <li key={group.id}>
                      <Link href={route('groups.show', [group])} className="text-[#17A08F] hover:text-[#0056B3] hover:underline">
                        {group.name}
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>

              <div className="col-span-4">
                <MyDataRequests requests={dataRequests} />
              </div>

              <div className="col-span-4">
                <DataRequestsForMe requests={dataRequestsForMe} />
              </div>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}
