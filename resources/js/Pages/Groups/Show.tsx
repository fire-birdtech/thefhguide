import { type Group, type PageProps } from '@/types'
import { type ReactElement } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'
import { Head } from '@inertiajs/react'
import { Heading } from '@/Components/Typography/Headers'
import ChangeGroupName from '@/Pages/Groups/partials/change-group-name'

type Props = {
  group: Group
} & PageProps

export default function GroupShow ({ auth, group }: Props): ReactElement {
  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation />}
    >
      <Head title={group.name} />

      <div className="p-4 sm:px-6 lg:px-8">
        <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
          <Heading className="p-4">
            Group Management
          </Heading>
          <div className="border-t border-gray-300 p-4 space-y-4">
            <div>
              <strong>Group Name:</strong> {group.name}
            </div>
            <div>
              <strong>Created:</strong> {group.created_at}
            </div>
            <div>
              <strong>Owner: </strong> {group.owner.email}
            </div>

            <div className="mt-4 grid grid-cols-12 gap-x-4">
              <div className="col-span-4">
                <ChangeGroupName group={group} />
              </div>
              <div className="col-span-8">
                <form>
                  <fieldset className="border-2 border-neutral-100 p-4">
                    <legend className="text-xl">
                      Add User to Group
                    </legend>
                    <p>
                      You must have access to view the user&apos;s data in order to add them to the group. If this
                      select box is empty, you have already added all the users you have permission to add.
                    </p>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}
