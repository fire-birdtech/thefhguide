import { type FormEventHandler, type ReactElement, useEffect } from 'react'
import { Head, Link, useForm } from '@inertiajs/react'
import Guest from '@/Layouts/Guest'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'

export default function Register (): ReactElement {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  })

  useEffect(() => {
    return () => {
      reset('password', 'password_confirmation')
    }
  }, [])

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    post(route('register'))
  }

  return (
    <Guest>
      <Head title="Register"/>

      <form className="space-y-4" onSubmit={submit}>
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

        <div>
          <InputLabel label="Password"/>
          <TextInput
            type="password"
            value={data.password}
            className="mt-1 block w-full"
            onChange={(e) => {
              setData('password', e.target.value)
            }}
            required
          />
        </div>

        <div>
          <InputLabel label="Confirm Password"/>
          <TextInput
            type="password"
            value={data.password_confirmation}
            className="mt-1 block w-full"
            onChange={(e) => {
              setData('password_confirmation', e.target.value)
            }}
            required
          />
        </div>

        <div className="flex items-center justify-end mt-4">
          <Link
            href={route('login')}
            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Already registered?
          </Link>

          <PrimaryButton className="ml-4" disabled={processing}>
            Register
          </PrimaryButton>
        </div>
      </form>
    </Guest>
  )
}
