import { type FormEventHandler, type ReactElement } from 'react'
import { Head, useForm } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'
import { type Collection, type PageProps } from '@/types'

export default function CollectionEdit ({ auth, collection }: PageProps<{ collection: Collection }>): ReactElement {
  const { data, setData, put, errors } = useForm<Collection>({
    ...collection
  })

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    put(route('editor.collections.update', [collection.id]))
  }

  return (
    <>
      <Head title={`Admin - Edit ${collection.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Edit Collection: {collection.name}
          </Header3>
          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Collection name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-7">
                  <TextInput
                    value={data.name}
                    className="mt-1 block w-full"
                    onChange={(e) => { setData('name', e.target.value) }}
                    isFocused
                  />
                  <InputError message={errors.name} className="mt-1"/>
                </div>
              </div>
              <div className="px-6 py-4 sm:border-t sm:border-gray-200">
                <div className="flex justify-end space-x-3">
                  <SecondaryButton href={route('editor.collections.show', [collection.id])}>
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
