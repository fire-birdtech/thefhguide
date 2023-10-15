import { Head } from '@inertiajs/react'
import UpdatePassword from '@/Components/Forms/UpdatePassword'
import Authenticated from '@/Layouts/Authenticated'
import Settings from '@/Layouts/Settings'
import { type PageProps } from '@/types'
import { type ReactElement } from 'react'

export default function SecurityPage ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Security"/>

      <Authenticated user={auth.user}>
        <Settings>
          <UpdatePassword user={auth.user}/>
        </Settings>
      </Authenticated>
    </>
  )
}
