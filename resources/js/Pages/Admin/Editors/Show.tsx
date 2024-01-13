import { type ReactElement, useState } from 'react'
import { Head, router } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown'
import { DescriptionList, DescriptionListItem } from '@/Components/DescriptionList'
import Badge from '@/Components/Badge'
import { type PageProps, type User } from '@/types'
import DangerModal from '@/Components/Modals/Danger'
import { Dialog } from '@headlessui/react'

export default function EditorShow ({ auth, user }: PageProps<{ user: User }>): ReactElement {
  const [confirmRemoveUserRole, setConfirmRemoveUserRole] = useState<boolean>(false)

  const removeRole = (): void => {
    router.post(route('admin.editors.remove', user.id))
  }

  const usersMatch = auth.user.id === user.id

  const upperCaseRole = (): string => user.roles[0].name.charAt(0).toUpperCase() + user.roles[0].name.slice(1)

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('admin.editors.edit', [user.id]) }
    ],
    [
      { name: `Remove ${upperCaseRole()}`, as: 'emitter', icon: 'UserMinusIcon', emit: () => { setConfirmRemoveUserRole(true) }, disabled: usersMatch }
    ]
  ]

  return (
    <>
      <Head title={`Admin - ${user.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Editor Details: {user.name}
              </Header3>
            </div>
            <div className="ml-4">
              <SecondaryButtonWithDropdown
                buttonText="Options"
                actions={actions}
              />
            </div>
          </div>

          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <DescriptionList>
              <DescriptionListItem term="Name" details={user.name}/>
              <DescriptionListItem term="Email" details={user.email}/>
              <DescriptionListItem term="Role" details={<Badge text={user.roles[0].name}/>}/>
              {user.admin !== null ? (
                <DescriptionListItem term="Admin" details={user.admin.name}/>
              ) : null}
            </DescriptionList>
          </div>
        </Container>
      </Admin>

      <DangerModal
        destroy={removeRole}
        open={confirmRemoveUserRole}
        setOpen={setConfirmRemoveUserRole}
        dangerButtonText="Remove"
      >
        <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
          Remove Role
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
            Are you sure you want to remove {user.name}&apos;s role?
          </p>
        </div>
      </DangerModal>
    </>
  )
}
