import { Head } from '@inertiajs/react'
import Authenticated from '@/Layouts/Authenticated'
import Settings from '@/Layouts/Settings'
import DeleteAccount from '@/Components/Forms/DeleteAccount'
import { type PageProps } from '@/types'
import { type ReactElement } from 'react'

export default function Account ({ auth, hasRoles }: PageProps<{ hasRoles: boolean }>): ReactElement {
  return (
    <>
      <Head title="Account"/>

      <Authenticated user={auth.user}>
        <Settings>
          <DeleteAccount hasRoles={hasRoles} user={auth.user}/>
        </Settings>
      </Authenticated>
    </>
  )
}
