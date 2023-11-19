import { type FormEventHandler, type ReactElement } from 'react'
import { Head, useForm } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import AddCoverImage from '@/Components/Forms/AddCoverImage'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { type Collection, type PageProps, type Project } from '@/types'

export default function ProjectEdit ({ auth, collections, project }: PageProps<{
  collections: Collection[]
  project: Project
}>): ReactElement {
  const { data, setData, errors, put } = useForm({
    name: project.name,
    image: {}
  })

  const updateCover = (value: File): void => {
    setData('image', value)
  }

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    put(route('editor.projects.update', [project.id]))
  }

  return (
    <>
      <Head title={`Admin - Projects - Edit ${project.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Edit Project: {project.name}
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
              <AddCoverImage
                name={data.name}
                errorMessage={errors.image}
                imagePath={project.cover_image_path}
                imageUrl={project.cover_image_url}
                onChange={(value) => { updateCover(value) }}
              />
              <div className="px-6 py-4">
                <div className="flex justify-end space-x-3">
                  <SecondaryButton href={route('editor.projects.show', [project.id])}>
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
