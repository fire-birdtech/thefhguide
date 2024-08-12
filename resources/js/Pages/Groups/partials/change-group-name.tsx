import { type ReactElement } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import { useForm } from '@inertiajs/react'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { type Group } from '@/types'

export default function ChangeGroupName ({ group }: { group: Group }): ReactElement {
  const { data, setData, put } = useForm({
    name: group.name
  })

  const submit = (): void => {
    put(route('groups.update', [group]))
  }

  return (
    <form onSubmit={submit}>
      <fieldset className="border-2 border-neutral-100 p-4">
        <legend className="text-xl">
          Change Group Name
        </legend>
        <InputLabel label="New Name of Group" />
        <TextInput
          className="mt-1 w-full"
          value={data.name}
          onChange={(event) => {
            setData('name', event.target.value)
          }}
        />
        <PrimaryButton className="mt-3">
          Rename
        </PrimaryButton>
      </fieldset>
    </form>
  )
}
