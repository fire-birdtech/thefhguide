import { type FormEventHandler, type ReactElement, useRef, useState } from 'react'
import { useForm } from '@inertiajs/react'
import { Dialog } from '@headlessui/react'
import { Header3 } from '@/Components/Typography/Headers'
import { Paragraph } from '@/Components/Typography/Paragraphs'
import DangerButton from '@/Components/Buttons/DangerButton'
import TextInput from '@/Components/Forms/TextInput'
import DangerModal from '@/Components/Modals/Danger'
import { type User } from '@/types'
import InputLabel from '@/Components/Forms/InputLabel'
import InputError from '@/Components/Forms/InputError'

export default function DeleteAccount ({ hasRoles, user }: { hasRoles: boolean, user: User }): ReactElement {
  const [confirmingUserDeletion, setConfirmingUserDeletion] = useState(false)
  const passwordInput = useRef<HTMLInputElement>()

  const {
    data,
    setData,
    delete: destroy,
    reset,
    errors
  } = useForm({
    password: ''
  })

  const confirmUserDeletion = (): void => {
    setConfirmingUserDeletion(true)
  }

  const deleteUser: FormEventHandler = (e) => {
    e.preventDefault()

    destroy(route('profile.destroy'), {
      preserveScroll: true,
      onSuccess: () => {
        closeModal()
      },
      onError: () => passwordInput.current?.focus(),
      onFinish: () => {
        reset()
      }
    })
  }

  const closeModal = (): void => {
    setConfirmingUserDeletion(false)

    reset()
  }

  return (
    <>
      <div className="space-y-6 sm:space-y-5">
        <div>
          <Header3>
            Delete Account
          </Header3>
        </div>
        <div className="pt-4 border-t border-gray-200">
          <div className="max-w-md space-y-6 sm:space-y-5">
            {hasRoles ? (
              <div className="space-y-2">
                <Paragraph>
                  Your account currently has a role in the CMS.
                </Paragraph>
                <Paragraph>
                  You must have the role removed before you can delete your account.
                </Paragraph>
              </div>
            ) : null}
            <DangerButton onClick={confirmUserDeletion} disabled={hasRoles}>
              Delete account
            </DangerButton>
          </div>
        </div>
      </div>

      <DangerModal maxWidthClass="sm:max-w-xl" destroy={deleteUser} open={confirmingUserDeletion} setOpen={setConfirmingUserDeletion}>
        <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
          Are you sure you want to delete your account?
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please
            enter your password to confirm you would like to permanently delete your account.
          </p>
        </div>
        <form className="mt-4">
          <InputLabel label="Password"/>
          <TextInput
            type="password"
            ref={passwordInput}
            value={data.password}
            onChange={(e) => {
              setData('password', e.target.value)
            }}
            className="block w-full"
            isFocused
            placeholder="Password"
          />
          <InputError message={errors.password}/>
        </form>
      </DangerModal>
    </>
  )
}
