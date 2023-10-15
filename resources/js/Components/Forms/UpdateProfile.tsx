import { type FormEventHandler, type ReactElement } from 'react'
import { useForm } from '@inertiajs/react'
import { Header3 } from '@/Components/Typography/Headers'
import { Paragraph } from '@/Components/Typography/Paragraphs'
import TextInput from '@/Components/Forms/TextInput'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import InputLabel from '@/Components/Forms/InputLabel'
import InputError from '@/Components/Forms/InputError'
import { type User } from '@/types'

export default function UpdateProfile ({ user }: { user: User }): ReactElement {
  const { data, setData, put, processing, errors, reset } = useForm({
    name: user.name,
    email: user.email
  })

  const updateProfile: FormEventHandler = (e): void => {
    e.preventDefault()

    put(route('settings.update-profile'), {
      preserveScroll: true,
      onSuccess: () => {
        reset()
      }
    })
  }

  return (
    <div className="space-y-6 sm:space-y-5">
      <div>
        <Header3>
          Public Profile
        </Header3>
        <Paragraph className="mt-1 max-w-2xl">
          This information will be displayed publicly so be careful what you share.
        </Paragraph>
      </div>
      <form onSubmit={updateProfile} className="pt-4 border-t border-gray-200">
        <div className="max-w-md space-y-6 sm:space-y-5">
          <div>
            <InputLabel label="Name"/>
            <TextInput
              value={data.name}
              className="mt-1 block w-full"
              isFocused={true}
              onChange={(e) => {
                setData('name', e.target.value)
              }}
              required
            />
            <InputError message={errors.name} className="mt-1"/>
          </div>

          <div>
            <InputLabel label="Email"/>
            <TextInput
              type="email"
              value={data.email}
              className="mt-1 block w-full"
              onChange={(e) => {
                setData('email', e.target.value)
              }}
              required
            />
            <InputError message={errors.email} className="mt-1"/>
          </div>

          <PrimaryButton disabled={processing}>
            Update profile
          </PrimaryButton>
        </div>
      </form>
    </div>
  )
}
