import { type FormEventHandler, type ReactElement } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import TextArea from '@/Components/Forms/TextArea'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { useForm } from '@inertiajs/react'
import InputError from '@/Components/Forms/InputError'

export default function RequestUserDataAccess (): ReactElement {
  const { data, setData, post, errors } = useForm({
    email: '',
    message: ''
  })

  const submit: FormEventHandler = (event) => {
    event.preventDefault()

    post(route('user-data-access.store'))
  }

  return (
    <form onSubmit={submit}>
      <fieldset className="border-2 border-neutral-100 p-4 m-2">
        <legend className="text-xl">
          Request Access to Another User&apos;s Data
        </legend>
        <p>
          Input the email address that the user has associated with his/her account. Users will be asked
          whether to grant you access to their data. If they accept, you will be able to add them to Groups.
        </p>
        <div className="mt-3">
          <InputLabel label="User's Email Address" />
          <TextInput
            type="email"
            className="mt-1 w-96"
            value={data.email}
            onChange={(event) => {
              setData('email', event.target.value)
            }}
          />
          <InputError message={errors.email} />
        </div>
        <div className="mt-3">
          <InputLabel label="Message (optional)"/>
          <TextArea
            className="mt-1 w-full"
            value={data.message}
            onChange={(event) => {
              setData('message', event.target.value)
            }}
          ></TextArea>
          <InputError message={errors.message} />
        </div>
        <PrimaryButton className="mt-3">
          Request
        </PrimaryButton>
      </fieldset>
    </form>
  )
}
