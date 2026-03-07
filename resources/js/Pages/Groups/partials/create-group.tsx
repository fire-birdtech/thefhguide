import { type ReactElement } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { useForm } from '@inertiajs/react'

export default function CreateGroup (): ReactElement {
  const { data, setData, post, reset } = useForm({
    name: ''
  })

  const submit = (e): void => {
    e.preventDefault()
    post(route('groups.store'), {
      onFinish: () => {
        reset()
      }
    })
  }

  return (
    <form onSubmit={submit}>
      <fieldset className="border-2 border-neutral-100 p-4 m-2">
        <legend className="text-xl">
          Create New Group
        </legend>
        <InputLabel label="Name of Group"/>
        <TextInput
          className="mt-1 w-full"
          value={data.name}
          onChange={(event) => {
            setData('name', event.target.value)
          }}
        />
        <PrimaryButton type="submit" className="mt-3">
          Create
        </PrimaryButton>
      </fieldset>
    </form>
  )
}
