import { type ReactElement } from 'react'
import { Heading } from '@/Components/Typography/Headers'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import TextArea from '@/Components/Forms/TextArea'
import { useForm } from '@inertiajs/react'
import TextEditor from "@/Components/Forms/TextEditor";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function CreateTip (): ReactElement {
  const { data, setData, post, reset } = useForm({
    title: '',
    body: ''
  })

  const submit = () => {
    post(route('editor.daily-tips.store'), {
      onSuccess: () => {
        reset()
      }
    })
  }

  return (
    <div className="overflow-hidden rounded-lg bg-white shadow">
      <div className="px-4 py-5 sm:p-6">
        <Heading level={4} fontFamily="sans">
          Add a Daily Tip
        </Heading>
        <form onSubmit={submit}>
          <div className="mt-3">
            <InputLabel label="Title"/>
            <TextInput
              className="mt-1 block w-96"
              value={data.title}
              onChange={(e) => {
                setData('title', e.target.value)
              }}
            />
          </div>
          <div className="mt-3">
            <InputLabel label="Tip"/>
            <TextEditor
              className="mt-1 block w-full"
              update={(value) => {
                setData('body', value)
              }}
              value={data.body}
            />
          </div>
          <PrimaryButton className="mt-4">
            Create
          </PrimaryButton>
        </form>
      </div>
    </div>
  )
}
