import { type FormEventHandler, type ReactElement } from 'react'
import { Head, useForm } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { type Goal, type PageProps } from '@/types'

export default function GoalEdit ({ auth, goal }: PageProps<{ goal: Goal }>): ReactElement {
  const { data, setData, errors, put } = useForm({
    name: goal.name,
    summary: goal.summary,
    show_me_video_url: goal.show_me_video_url
  })

  const submit: FormEventHandler = (e): void => {
    e.preventDefault()

    put(route('editor.goals.update', [goal.id]))
  }

  return (
    <>
      <Head title={`Admin - Edit ${goal.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Edit Goal: {goal.name}
          </Header3>
          <div className="mt-4 bg-white rounded-md shadow">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Project name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
                  <TextInput
                    value={data.name}
                    className="block w-full"
                    isFocused={true}
                    onChange={(e) => {
                      setData('name', e.target.value)
                    }}
                  />
                  <InputError message={errors.name}/>
                </div>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Summary" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
                  {/* TextEditor */}
                  <InputError message={errors.summary}/>
                </div>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label={'"Show Me" Video'} className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
                  <TextInput
                    value={data.show_me_video_url}
                    className="block w-full"
                    onChange={(e) => {
                      setData('show_me_video_url', e.target.value)
                    }}
                  />
                  <InputError message={errors.show_me_video_url}/>
                </div>
              </div>

              <div className="px-6 py-4">
                <div className="flex justify-end space-x-3">
                  <SecondaryButton href={route('editor.goals.show', [goal.id])}>
                    Cancel
                  </SecondaryButton>
                  <PrimaryButton type="submit">
                    Save
                  </PrimaryButton>
                </div>
              </div>
            </form>
          </div>
        </Container>
      </Admin>
    </>
  )
}
