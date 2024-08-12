import { Head } from '@inertiajs/react'
import UpdatePassword from '@/Components/Forms/UpdatePassword'
import Authenticated from '@/Layouts/Authenticated'
import Settings from '@/Layouts/Settings'
import { type PageProps } from '@/types'
import { type ReactElement } from 'react'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'

export default function SecurityPage ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Security"/>

      <Authenticated
        user={auth.user}
        header={<OnlineTrackerNavigation />}
      >
        <Settings>
          <UpdatePassword user={auth.user}/>
        </Settings>
      </Authenticated>
    </>
  )
}
