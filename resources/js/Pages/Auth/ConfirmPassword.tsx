import { type FormEventHandler, type ReactElement, useEffect } from 'react'
import { Head, useForm } from '@inertiajs/react'
import Guest from '@/Layouts/Guest'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import TextInput from '@/Components/Forms/TextInput'
import InputLabel from '@/Components/Forms/InputLabel'
import InputError from '@/Components/Forms/InputError'

export default function ConfirmPassword (): ReactElement {
  const { data, setData, post, processing, errors, reset } = useForm({
    password: ''
  })

  useEffect(() => {
    return () => {
      reset('password')
    }
  }, [])

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    post(route('password.confirm'))
  }

  return (
    <Guest>
      <Head title="Confirm Password"/>

      <div className="mb-4 text-sm text-gray-600">
        This is a secure area of the application. Please confirm your password before continuing.
      </div>

      <form onSubmit={submit}>
        <div className="mt-4">
          <InputLabel label="Password"/>
          <TextInput
            type="password"
            value={data.password}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => {
              setData('password', e.target.value)
            }}
          />
          <InputError message={errors.password} className="mt-2"/>
        </div>

        <div className="flex items-center justify-end mt-4">
          <PrimaryButton className="ml-4" disabled={processing}>
            Confirm
          </PrimaryButton>
        </div>
      </form>
    </Guest>
  )
}
