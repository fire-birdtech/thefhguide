import { Head } from '@inertiajs/react'
import Authenticated from '@/Layouts/Authenticated'
import Settings from '@/Layouts/Settings'
import UpdateProfile from '@/Components/Forms/UpdateProfile'
import { type PageProps } from '@/types'
import { type ReactElement } from 'react'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'

export default function Profile ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Profile"/>

      <Authenticated
        user={auth.user}
        header={<OnlineTrackerNavigation />}
      >
        <Settings>
          <UpdateProfile user={auth.user}/>
        </Settings>
      </Authenticated>
    </>
  )
}
