import { type FormEventHandler, type ReactElement, useEffect } from 'react'
import { Head, Link, useForm } from '@inertiajs/react'
import Checkbox from '@/Components/Forms/Checkbox'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import Guest from '@/Layouts/Guest'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'

export default function Login ({ status, canResetPassword }: {
  status?: string
  canResetPassword: boolean
}): ReactElement {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: false
  })

  useEffect(() => {
    return () => {
      reset('password')
    }
  }, [])

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    post(route('login'))
  }

  return (
    <Guest>
      <Head title="Login"/>

      {status !== null && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

      <form className="space-y-4" onSubmit={submit}>
        <div>
          <InputLabel label="Email"/>
          <TextInput
            type="email"
            value={data.email}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => {
              setData('email', e.target.value)
            }}
          />
          <InputError message={errors.email} className="mt-1"/>
        </div>

        <div>
          <InputLabel label="Password"/>
          <TextInput
            type="password"
            value={data.password}
            className="mt-1 block w-full"
            onChange={(e) => {
              setData('password', e.target.value)
            }}
          />
          <InputError message={errors.password} className="mt-1"/>
        </div>

        <div className="block mt-4">
          <label className="flex items-center">
            <Checkbox
              name="remember"
              checked={data.remember}
              onChange={(e) => {
                setData('remember', e.target.checked)
              }}
            />
            <span className="ml-2 text-sm text-gray-600">Remember me</span>
          </label>
        </div>

        <div className="mt-4 flex items-center justify-end">
          {canResetPassword && (
            <Link
              href={route('password.request')}
              className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              Forgot your password?
            </Link>
          )}

          <PrimaryButton className="ml-4" disabled={processing}>
            Log in
          </PrimaryButton>
        </div>
      </form>
    </Guest>
  )
}
