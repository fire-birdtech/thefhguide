import { type FormEventHandler, type ReactElement } from 'react'
import { Head, useForm } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import AddCoverImage from '@/Components/Forms/AddCoverImage'
import TextEditor from '@/Components/Forms/TextEditor'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import InputError from '@/Components/Forms/InputError'
import ChoiceContentForm from '@/Components/Forms/Choices/ChoiceContentForm'
import { type Draft, type PageProps, type Resource } from '@/types'

export default function DraftCreate ({ auth, parentId, type }: PageProps<{ parent_id: number, type: string }>): ReactElement {
  const { data, setData, post, errors, processing } = useForm<Draft>({
    type,
    parentId,
    name: '',
    image: {},
    summary: null,
    show_me_video_url: null,
    content: []
  })

  const updateCover = (value: File): void => {
    setData('image', value)
  }

  const updateProperty = (index: number, value: string | Resource[]): void => {
    const { content } = data
    content[index].data = value

    setData({
      ...data,
      content
    })
  }

  const submit: FormEventHandler = (e) => {
    e.preventDefault()
    if (data.image !== typeof 'object') {
      delete data.image
    }
    post(route('editor.drafts.store'))
  }

  return (
    <>
      <Head title="Create Draft"/>

      <Admin user={auth.user}>
        <Container>
          <div className="flex items-center justify-between flex-wrap sm:flex-nowrap">
            <Header3>
              Create Draft
            </Header3>
            <PrimaryButton onClick={submit} disabled={processing}>
              Save
            </PrimaryButton>
          </div>

          <div className="mt-4 bg-white rounded-md shadow">
            <form className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-7">
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

              {type === 'project' ? (
                <AddCoverImage
                  name={data.name}
                  errorMessage={errors.image}
                  imagePath={data?.cover_image_path}
                  imageUrl={data?.cover_image_url}
                  onChange={(value) => { updateCover(value) }}
                />
              ) : null}

              {type === 'goal' ? (
                <>
                  <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                    <InputLabel label="Summary" className="sm:mt-px sm:pt-2"/>
                    <div className="mt-1 sm:mt-0 sm:col-span-7">
                      <TextEditor
                        value={data.summary}
                        update={(value) => {
                          setData('summary', value)
                        }}
                      />
                      <InputError message={errors.summary}/>
                    </div>
                  </div>

                  <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                    <InputLabel label={'"Show Me" Video'} className="sm:mt-px sm:pt-2"/>
                    <div className="mt-1 sm:mt-0 sm:col-span-7">
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
                </>
              ) : null}

              {type === 'choice' ? (
                <ChoiceContentForm content={data.content}/>
              ) : null}
            </form>
          </div>
        </Container>
      </Admin>
    </>
  )
}
